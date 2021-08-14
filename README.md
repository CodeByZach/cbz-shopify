CbzShopify
==========

[![Latest Release](https://img.shields.io/github/tag/codebyzach/cbz-shopify.svg?label=version)](https://github.com/codebyzach/cbz-shopify/releases)

CbzShopify is a modern PHP library based on Guzzle for [Shopify](https://www.shopify.com).

## Dependencies

* [PHP](https://www.php.net): ^7.3
* [Guzzle Services](https://github.com/guzzle/guzzle-services): ^1.2
* [Laminas Diactoros](https://github.com/laminas/laminas-diactoros): ^2.6

## Installation

Installation of CbzShopify is only officially supported using Composer:

```sh
composer require 'codebyzach/cbz-shopify'
```

## REST API

CbzShopify provides a one-to-one mapping with API methods defined in [Shopify doc](https://shopify.dev/api). Since version 4, it also
supports a basic integration with the new GraphQL admin API.

### Private app

In order to use CbzShopify as a private app, you must first instantiate the client:

```php
$shopify_client = new ShopifyClient([
    'private_app' => true,
    'api_key'     => 'YOUR_API_KEY',
    'password'    => 'YOUR_PASSWORD',
    'shop'        => 'domain.myshopify.com',
    'version'     => '2021-07'
]);
```

> Make sure to always include a version. [More info about Shopify versioning](https://shopify.dev/api/usage/versioning)

### Public app

When using a public app, you instantiate the client a bit differently:

```php
$shopify_client = new ShopifyClient([
    'private_app'   => false,
    'api_key'       => 'YOUR_API_KEY', // In public app, this is the app ID
    'access_token'  => 'MERCHANT_TOKEN',
    'shop'          => 'merchant.myshopify.com',
    'version'       => '2021-07'
]);
```

> Make sure to always include a version. [More info about Shopify versioning](https://shopify.dev/api/usage/versioning)

### Using a container

CbzShopify also provides built-in [container-interop](https://github.com/container-interop/container-interop) factories
that you can use. You must make sure that your container contains a service called "config" that is an array with a key
`cbz_shopify` containing the required config:

```php
// myconfig.php

return [
    'cbz_shopify' => [
        'private_app'   => false,
        'api_key'       => 'YOUR_API_KEY', // In public app, this is the app ID
        'access_token'  => 'MERCHANT_TOKEN',
        'shop'          => 'merchant.myshopify.com',
    ],
];
```

If you're using Zend\ServiceManager 3, you can use [Zend\ComponentInstaller](https://zendframework.github.io/zend-component-installer/)
to register our factories into Zend\ServiceManager automatically.

However if you're using other framework or other container, you can still manually register our factories, they are
under [src/Container](/src/Container) folder.

### Validating a request

CbzShopify client provides an easy way to validate an incoming request to make sure it comes from Shopify through the `RequestValidator`
object. It requires a PSR7 requests and a shared secret:

```php
use CbzShopify\Exception\InvalidRequestException;
use CbzShopify\Validator\RequestValidator;

$validator = new RequestValidator();

try {
    $validator->validateRequest($psr7Request, 'shared_secret');
} catch (InvalidRequestException $exception) {
    // Request is not valid
}
```

### Validating a webhook

Similarily, you can use the `WebhookValidator` to validate your webhook:

```php
use CbzShopify\Exception\InvalidWebhookException;
use CbzShopify\Validator\WebhookValidator;

$validator = new WebhookValidator();

try {
    $validator->validateWebhook($psr7Request, 'shared_secret');
} catch (InvalidWebhookException $exception) {
    // Request is not valid
}
```

### Validating an application request

Finally, you can also use the `ApplicationProxyRequestValidator` to validate application proxy requests:


```php
use CbzShopify\Exception\InvalidApplicationProxyRequestException;
use CbzShopify\Validator\ApplicationProxyRequestValidator;

$validator = new ApplicationProxyRequestValidator();

try {
  $validator->validateApplicationProxyRequest($psr7Request, 'shared_secret');
} catch {
  // Request is not valid
}
```

### Create an authorization response

CbzShopify provides an easy way to create a PSR7 compliant `ResponseInterface` to create an authorization response:

```php
use CbzShopify\OAuth\AuthorizationRedirectResponse;

$api_key         = 'app_123';
$shop_domain     = 'shop_to_authorize.myshopify.com';
$scopes          = ['read_orders', 'read_products'];
$redirection_uri = 'https://myapp.test.com/oauth/redirect';
$nonce           = 'strong_nonce';

$response = new AuthorizationRedirectResponse($api_key, $shop_domain, $scopes, $redirection_uri, $nonce);
```

While the `nonce` parameter is required, CbzShopify does not make any assumption about how to save the nonce and check it when
Shopify redirects to your server. You are responsible to safely saving the nonce.

### Exchanging a code against an access token

You can use the `TokenExchanger` class to exchange a code to a long-lived access token:

```php
use GuzzleHttp\Client;
use CbzShopify\OAuth\TokenExchanger;

$api_key       = 'app_123';
$shared_secret = 'secret_123';
$shop_domain   = 'shop_to_authorize.myshopify.com';
$code          = 'code_123';

$token_exchanger = new TokenExchanger(new Client());
$access_token    = $token_exchanger->exchangeCodeForToken($api_key, $shared_secret, $shop_domain, $code);
```

CbzShopify also provides a simple factory compliant with [container-interop](https://github.com/container-interop/container-interop)
that you can register to the container of your choice, with the `CbzShopify\Container\TokenExchangerFactory`.

### Exploiting responses

CbzShopify returns Shopify response directly. However, by default, Shopify wrap the responses by a top-key. For instance, if
you want to retrieve shop information, Shopify will return this payload:

```json
{
    "shop": {
        "id": 123,
        "domain": "myshop.myshopify.com"
    }
}
```

This is a bit inconvenient to use as we would need to do that:

```php
$shop_domain = $shopify_client->getShop()['shop']['domain'];
```

Instead, CbzShopify automatically "unwraps" response, so you can use the more concise code:

```php
$shop_domain = $shopify_client->getShop()['domain'];
```

When reading Shopify API doc, make sure you remove the top key when exploiting responses.

#### Count

Similarily, when you use one of the `count` endpoint, CbzShopify will automatically extract the value from Shopify's response, so you do not need
to manually access the count property:

```php
$count = $shopify_client->countOrders();
// $count is already an integer
```

### Using iterators

For most "list" endpoints (`getProducts`, `getCollections`...), Shopify allows you to get up to 250 resources at a time. When using the standard `get**`
method, you are responsible to handle the pagination yourself.

For convenience, CbzShopify allows you to easily iterate through all resources efficiently (internally, we are using generators). Here is how you can
get all the products from a given store:

```php
foreach ($shopify_client->getProductsIterator(['fields' => 'id,title']) as $product) {
   // Do something with product
}
```

CbzShopify will take care of doing additional requests when it has reached the end of a given page.

### Executing multiple requests concurrently

For optimization purposes, it may be desirable to execute multiple requests concurrently. To do that, CbzShopify client allow you to take advantage of
the underlying Guzzle client and execute multiple requests at the same time.

To do that, you can manually create the Guzzle commands, and execute them all. CbzShopify will take care of authenticating all requests individually, and
extracting the response payload. For instance, here is how you could get both shop info and products info:

```php
$command1 = $client->getCommand('GetShop', ['fields' => 'id']);
$command2 = $client->getCommand('GetProducts', ['fields' => 'id,title']);

$results = $client->executeAll([$command1, $command2]);

// $results[0] represents the response of $command1, $results[1] represents the response of $command2
```

If a request has failed, it will contain an instance of `GuzzleHttp\Command\Exception\CommandException`. For instance, here is how you could iterate
through all the results:

```php
use GuzzleHttp\Command\Exception\CommandException;

foreach ($results as $singleResult) {
   if ($singleResult instanceof CommandException) {
      // Get the command that has failed, and eventually retry
      $command = $singleResult->getCommand();
      continue;
   }

   // Otherwise, $singleResult is just an array that contains the Shopify data
}
```

## GraphQL API

In 2018, Shopify launched a new API, called the [GraphQL Admin API](https://shopify.dev/api/admin/graphql/reference). This new API comes with a lot of
advantages compared to the REST API:

* It allows to access more efficiently to the various Shopify resources (you can for instance get a collection, with all its products and variants, by
using a single request).
* It offers access to some resources that are not exposed through the REST API.

The version 4 of CbzShopify now ships with a basic GraphQL client. It does not yet support the following features, though:

* Automatic pagination
* Automatic handling of Shopify rate limits

In order to use the client, you must instantiate it. Instead of the ShopifyClient, you must create a `CbzShopify\ShopifyGraphQLClient`. If you are using
a private app:

```php
$client = new ShopifyGraphQLClient([
    'shop'        => 'test.myshopify.com',
    'version'     => '2021-07',
    'private_app' => true,
    'password'    => 'YOUR PASSWORD'
]);
```

> Make sure to always include a version. [More info about Shopify versioning](https://shopify.dev/api/usage/versioning)

If you are using a public app:

```php
$client = new ShopifyGraphQLClient([
    'shop'         => 'test.myshopify.com',
    'version'      => '2021-07',
    'private_app'  => false,
    'access_token' => 'ACCESS TOKEN'
]);
```

> Make sure to always include a version. [More info about Shopify versioning](https://shopify.dev/api/usage/versioning)

### Queries

To perform query, simply enter your query as an heredoc. For instance, here is a GraphQL query that get the title and id of the first 5 collections,
as well as the 5 first products within those collections (this used to require several queries in the REST API, while everything can be done very
efficiently with GraphQL):

```php
$request = <<<'EOT'
query
{
  collections(first: 5) {
    edges {
      node {
        id
        title
        products(first: 5) {
          edges {
            node {
              id
              title
            }
          }
        }
      }
    }
  }
}
EOT;

$result = $client->request($request);
```

CbzShopify automatically unwrap the `data` top key from Shopify response, so you can retrieves the data like this:

```php
foreach ($result['collections']['edges'] as $collection) {
    var_dump('Collection title: ' . $collection['node']['title']);

    foreach ($collection['node']['products']['edges'] as $product) {
        var_dump('Product title: ' . $product['node']['title']);
    }
}
```

CbzShopify does not attempt to re-write the GraphQL response.

#### Variables

CbzShopify also fully supports GraphQL variable. For instance, here is how you can retrieve a given product by its ID by
using GraphQL variables:

```php
$request = <<<'EOT'
query getProduct($id: ID!)
{
  product(id: $id) {
    id
    title
  }
}
EOT;

$variables = [
    'id' => 'gid://shopify/Product/827442593835'
];

$result = $client->request($request, $variables);

var_dump($result);
```

### Mutations

Similarly, CbzShopify supports mutation. To do this, you simply need to use a mutation query. Here is an example that
is creating a product:

```php
$request = <<<'EOT'
mutation createProduct($product: ProductInput!)
{
  productCreate(input: $product) {
    userErrors {
      field
      message
    }
    product {
      id
    }
  }
}
EOT;

$variables = [
    'product' => [
        'title' => 'My product'
    ]
];

$result = $client->request($request, $variables);

var_dump($result);
```

This request will create a new product whose title is "My product", and will return the id of the product.

> For better error handling, you should always include the userErrors object in your response.

### Error handling

When using GraphQL requests, there are two kinds of errors that you can catch.

#### Request errors

Those errors are for malformed GraphQL requests. You can catch them using the `\CbzShopify\Exception\GraphQLErrorException` exception:

```php
try {
    $result = $client->request($request);
} catch (\CbzShopify\Exception\GraphQLErrorException $exception) {
    var_dump($exception->getErrors());
}
```

#### User errors

Those errors are for requests that are missing data (like incorrect data, missing data...). You can catch them using the
`\CbzShopify\Exception\GraphQLUserErrorException` exception:

```php
try {
    $result = $client->request($request);
} catch (\CbzShopify\Exception\GraphQLUserErrorException $exception) {
    var_dump($exception->getErrors());
}
```

## Implemented endpoints

- [Abandoned Checkouts](#abandoned-checkouts)
- [AccessScope](#accessscope)
- [ApplicationCharge](#applicationcharge)
- [ApplicationCredit](#applicationcredit)
- [Article](#article)
- [Asset](#asset)
- [AssignedFulfillmentOrder](#assignedfulfillmentorder)
- [Balance](#balance)
- [Balance Transaction](#balance-transaction)
- [Blog](#blog)
- [CancellationRequest](#cancellationrequest)
- [CarrierService](#carrierservice)
- [Checkout](#checkout)
- [Collect](#collect)
- [Collection](#collection)
- [CollectionListing](#collectionlisting)
- [Comment](#comment)
- [Country](#country)
- [Currency](#currency)
- [CustomCollection](#customcollection)
- [Customer](#customer)
- [Customer Address](#customer-address)
- [CustomerSavedSearch](#customersavedsearch)
- [Deprecated API Calls](#deprecated-api-calls)
- [DiscountCode](#discountcode)
- [Dispute](#dispute)
- [DraftOrder](#draftorder)
- [Event](#event)
- [Fulfillment](#fulfillment)
- [FulfillmentEvent](#fulfillmentevent)
- [FulfillmentOrder](#fulfillmentorder)
- [FulfillmentRequest](#fulfillmentrequest)
- [FulfillmentService](#fulfillmentservice)
- [GiftCard](#giftcard)
- [InventoryItem](#inventoryitem)
- [InventoryLevel](#inventorylevel)
- [Location](#location)
- [LocationsForMove](#locationsformove)
- [MarketingEvent](#marketingevent)
- [Metafield](#metafield)
- [MobilePlatformApplication](#mobileplatformapplication)
- [Multipass](#multipass)
- [Order](#order)
- [Order Risk](#order-risk)
- [Page](#page)
- [Payment](#payment)
- [Payout](#payout)
- [Policy](#policy)
- [PriceRule](#pricerule)
- [Product](#product)
- [Product Image](#product-image)
- [Product ResourceFeedback](#product-resourcefeedback)
- [Product Variant](#product-variant)
- [ProductListing](#productlisting)
- [Province](#province)
- [RecurringApplicationCharge](#recurringapplicationcharge)
- [Redirect](#redirect)
- [Refund](#refund)
- [Report](#report)
- [ResourceFeedback](#resourcefeedback)
- [ScriptTag](#scripttag)
- [ShippingZone](#shippingzone)
- [Shop](#shop)
- [SmartCollection](#smartcollection)
- [StorefrontAccessToken](#storefrontaccesstoken)
- [TenderTransaction](#tendertransaction)
- [Theme](#theme)
- [Transaction](#transaction)
- [UsageCharge](#usagecharge)
- [User](#user)
- [Webhook](#webhook)
- [Other Methods](#other-methods)
- [Iterator Methods](#iterator-methods)

### [Abandoned Checkouts](https://shopify.dev/api/admin/rest/reference/orders/abandoned-checkouts)
```php
int countAbandonedCheckouts(array $args = []);
array getAbandonedCheckouts(array $args = []);
```

### [AccessScope](https://shopify.dev/api/admin/rest/reference/access/accessscope)
```php
array getAccessScopes(array $args = []);
```

### [ApplicationCharge](https://shopify.dev/api/admin/rest/reference/billing/applicationcharge)
```php
array createApplicationCharge(array $args = []);
array getApplicationCharges(array $args = []);
array getApplicationCharge(array $args = []);
```

### [ApplicationCredit](https://shopify.dev/api/admin/rest/reference/billing/applicationcredit)
```php
array createApplicationCredit(array $args = []);
array getApplicationCredit(array $args = []);
array getApplicationCredits(array $args = []);
```

### [Article](https://shopify.dev/api/admin/rest/reference/online-store/article)
```php
array getArticles(array $args = []);
int countArticles(array $args = []);
array getArticle(array $args = []);
array createArticle(array $args = []);
array updateArticle(array $args = []);
array getArticlesAuthors(array $args = []);
array getArticlesTags(array $args = []);
array deleteArticle(array $args = []);
```

### [Asset](https://shopify.dev/api/admin/rest/reference/online-store/asset)
```php
array getAssets(array $args = []);
array getAsset(array $args = []);
array createAsset(array $args = []);
array updateAsset(array $args = []);
array deleteAsset(array $args = []);
```

### [AssignedFulfillmentOrder](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/assignedfulfillmentorder)
```php
array getAssignedFulfillmentOrders(array $args = []);
```

### [Balance](https://shopify.dev/api/admin/rest/reference/shopify_payments/balance)
```php
array getBalance(array $args = []);
```

### [Balance Transaction](https://shopify.dev/api/admin/rest/reference/shopify_payments/transaction)
```php
array getBalanceTransactions(array $args = []);
```

### [Blog](https://shopify.dev/api/admin/rest/reference/online-store/blog)
```php
array getBlogs(array $args = []);
int countBlogs(array $args = []);
array getBlog(array $args = []);
array createBlog(array $args = []);
array updateBlog(array $args = []);
array deleteBlog(array $args = []);
```

### [CancellationRequest](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/cancellationrequest)
```php
array sendCancellationRequest(array $args = []);
array acceptCancellationRequest(array $args = []);
array rejectCancellationRequest(array $args = []);
```

### [CarrierService](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/carrierservice)
```php
array createCarrierService(array $args = []);
array updateCarrierService(array $args = []);
array getCarrierServices(array $args = []);
array getCarrierService(array $args = []);
array deleteCarrierService(array $args = []);
```

### [Checkout](https://shopify.dev/api/admin/rest/reference/sales-channels/checkout)
```php
array createCheckout(array $args = []);
array completeCheckout(array $args = []);
array getCheckout(array $args = []);
array updateCheckout(array $args = []);
array getCheckoutShippingRates(array $args = []);
```

### [Collect](https://shopify.dev/api/admin/rest/reference/products/collect)
```php
array createCollect(array $args = []);
array deleteCollect(array $args = []);
array getCollects(array $args = []);
int countCollects(array $args = []);
array getCollect(array $args = []);
```

### [Collection](https://shopify.dev/api/admin/rest/reference/products/collection)
```php
array getCollection(array $args = []);
array getCollectionProducts(array $args = []);
```

### [CollectionListing](https://shopify.dev/api/admin/rest/reference/sales-channels/collectionlisting)
```php
array getCollectionListings(array $args = []);
array getCollectionListingProductIds(array $args = []);
array getCollectionListing(array $args = []);
array createCollectionListing(array $args = []);
array getCollectionListing(array $args = []);
```

### [Comment](https://shopify.dev/api/admin/rest/reference/online-store/comment)
```php
array getComments(array $args = []);
int countComments(array $args = []);
array getComment(array $args = []);
array createComment(array $args = []);
array updateComment(array $args = []);
array spamComment(array $args = []);
array unspamComment(array $args = []);
array approveComment(array $args = []);
array removeComment(array $args = []);
array restoreComment(array $args = []);
```

### [Country](https://shopify.dev/api/admin/rest/reference/store-properties/country)
```php
array getCountries(array $args = []);
int countCountries(array $args = []);
array getCountry(array $args = []);
array createCountry(array $args = []);
array updateCountry(array $args = []);
array deleteCountry(array $args = []);
```

### [Currency](https://shopify.dev/api/admin/rest/reference/store-properties/currency)
```php
array getCurrencies(array $args = []);
```

### [CustomCollection](https://shopify.dev/api/admin/rest/reference/products/customcollection)
```php
array getCustomCollections(array $args = []);
int countCustomCollections(array $args = []);
array getCustomCollection(array $args = []);
array createCustomCollection(array $args = []);
array updateCustomCollection(array $args = []);
array deleteCustomCollection(array $args = []);
```

### [Customer](https://shopify.dev/api/admin/rest/reference/customers/customer)
```php
array getCustomers(array $args = []);
array searchCustomers(array $args = []);
array getCustomer(array $args = []);
array createCustomer(array $args = []);
array updateCustomer(array $args = []);
array sendCustomerActivationUrl(array $args = []);
array sendCustomerInvite(array $args = []);
array deleteCustomer(array $args = []);
int countCustomers(array $args = []);
array getCustomerOrders(array $args = []);
```

### [Customer Address](https://shopify.dev/api/admin/rest/reference/customers/customer-address)
```php
array getCustomerAddresses(array $args = []);
array getCustomerAddress(array $args = []);
array createCustomerAddress(array $args = []);
array updateCustomerAddress(array $args = []);
array deleteCustomerAddress(array $args = []);
array updateCustomerAddresses(array $args = []);
array setDefaultCustomerAddress(array $args = []);
```

### [CustomerSavedSearch](https://shopify.dev/api/admin/rest/reference/customers/customersavedsearch)
```php
array getCustomerSavedSearches(array $args = []);
int countCustomerSavedSearches(array $args = []);
array getCustomerSavedSearch(array $args = []);
array getCustomerSavedSearchCustomers(array $args = []);
array createCustomerSavedSearch(array $args = []);
array updateCustomerSavedSearch(array $args = []);
array deleteCustomerSavedSearch(array $args = []);
```

### [Deprecated API Calls](https://shopify.dev/api/admin/rest/reference/deprecated_api_calls)
```php
array getDeprecatedApiCalls(array $args = []);
```

### [DiscountCode](https://shopify.dev/api/admin/rest/reference/discounts/discountcode)
```php
array createDiscountCode(array $args = []);
array updateDiscountCode(array $args = []);
array getDiscountCodes(array $args = []);
array getDiscountCode(array $args = []);
array lookupDiscountCode(array $args = []);
int countDiscountCodes(array $args = []);
array deleteDiscountCode(array $args = []);
array createDiscountCodeBatch(array $args = []);
array getDiscountCodeBatch(array $args = []);
array getDiscountCodeBatchDiscountCodes(array $args = []);
```

### [Dispute](https://shopify.dev/api/admin/rest/reference/shopify_payments/dispute)
```php
array getDisputes(array $args = []);
array getDispute(array $args = []);
```

### [DraftOrder](https://shopify.dev/api/admin/rest/reference/orders/draftorder)
```php
array createDraftOrder(array $args = []);
array updateDraftOrder(array $args = []);
array getDraftOrders(array $args = []);
array getDraftOrder(array $args = []);
int countDraftOrders(array $args = []);
array sendDraftOrderInvoice(array $args = []);
array deleteDraftOrder(array $args = []);
array completeDraftOrder(array $args = []);
```

### [Event](https://shopify.dev/api/admin/rest/reference/events/event)
```php
array getEvents(array $args = []);
array getEvent(array $args = []);
int countEvents(array $args = []);
```

### [Fulfillment](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillment)
```php
array getFulfillments(array $args = []);
array getFulfillmentOrderFulfillments(array $args = []);
int countFulfillments(array $args = []);
array getFulfullment(array $args = []);
array createFulfillment(array $args = []);
array createFulfillmentOrderFulfillment(array $args = []);
array updateFulfillment(array $args = []);
array updateFulfillmentOrderFulfillment(array $args = []);
array completeFulfillment(array $args = []);
array openFulfillment(array $args = []);
array cancelFulfillment(array $args = []);
array cancelFulfillmentOrderFulfillment(array $args = []);
```

### [FulfillmentEvent](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentevent)
```php
array getFulfillmentEvents(array $args = []);
array getFulfillmentEvent(array $args = []);
array createFulfillmentEvent(array $args = []);
array deleteFulfillmentEvent(array $args = []);
```

### [FulfillmentOrder](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentorder)
```php
array getFulfillmentOrders(array $args = []);
array getFulfillmentOrder(array $args = []);
int cancelFulfillmentOrder(array $args = []);
array closeFulfillmentOrder(array $args = []);
array moveFulfillmentOrder(array $args = []);
array openFulfillmentOrder(array $args = []);
array rescheduleFulfillmentOrder(array $args = []);
```

### [FulfillmentRequest](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentrequest)
```php
array sendFulfillmentRequest(array $args = []);
array acceptFulfillmentRequest(array $args = []);
array rejectFulfillmentRequest(array $args = []);
```

### [FulfillmentService](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentservice)
```php
array getFulfillmentServices(array $args = []);
array createFulfillmentService(array $args = []);
array getFulfillmentService(array $args = []);
array updateFulfillmentService(array $args = []);
array deleteFulfillmentService(array $args = []);
```

### [GiftCard](https://shopify.dev/api/admin/rest/reference/plus/giftcard)
```php
array getGiftCards(array $args = []);
array getGiftCard(array $args = []);
int countGiftCards(array $args = []);
array createGiftCard(array $args = []);
array updateGiftCard(array $args = []);
array disableGiftCard(array $args = []);
array searchGiftCards(array $args = [])
```

### [InventoryItem](https://shopify.dev/api/admin/rest/reference/inventory/inventoryitem)
```php
array getInventoryItems(array $args = []);
array getInventoryItem(array $args = []);
array updateInventoryItem(array $args = []);
```

### [InventoryLevel](https://shopify.dev/api/admin/rest/reference/inventory/inventorylevel)
```php
array getInventoryLevels(array $args = []);
array adjustInventoryLevel(array $args = []);
array deleteInventoryLevel(array $args = []);
array connectInventoryLevel(array $args = []);
array setInventoryLevel(array $args = []);
```

### [Location](https://shopify.dev/api/admin/rest/reference/inventory/location)
```php
array getLocations(array $args = []);
array getLocation(array $args = []);
int countLocations(array $args = []);
array getLocationInventoryLevels(array $args = []);
```

### [LocationsForMove](https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/locationsformove)
```php
array getLocationsForMove(array $args = []);
```

### [MarketingEvent](https://shopify.dev/api/admin/rest/reference/marketingevent)
```php
array getMarketingEvents(array $args = []);
int countMarketingEvents(array $args = []);
array getMarketingEvent(array $args = []);
array createMarketingEvent(array $args = []);
array updateMarketingEvent(array $args = []);
array deleteMarketingEvent(array $args = []);
array createMarketingEventEngagements(array $args = []);
```

### [Metafield](https://shopify.dev/api/admin/rest/reference/metafield)
```php
array getMetafields(array $args = []);
array getMetafield(array $args = []);
array createMetafield(array $args = []);
array updateMetafield(array $args = []);
array deleteMetafield(array $args = []);
```

### [MobilePlatformApplication](https://shopify.dev/api/admin/rest/reference/sales-channels/mobileplatformapplication)
```php
```

### [Multipass](https://shopify.dev/api/admin/rest/reference/plus/multipass)
```php
```

### [Order](https://shopify.dev/api/admin/rest/reference/orders/order)
```php
array getOrders(array $args = []);
int countOrders(array $args = []);
array getOrder(array $args = []);
array getOrderMetafields(array $args = []);
array createOrder(array $args = []);
array updateOrder(array $args = []);
array closeOrder(array $args = []);
array openOrder(array $args = []);
array cancelOrder(array $args = []);
```

### [Order Risk](https://shopify.dev/api/admin/rest/reference/orders/order-risk)
```php
```

### [Page](https://shopify.dev/api/admin/rest/reference/online-store/page)
```php
array getPages(array $args = []);
int countPages(array $args = []);
array getPage(array $args = []);
array getPageMetafields(array $args = []);
array createPage(array $args = []);
array updatePage(array $args = []);
array deletePage(array $args = []);
```

### [Payment](https://shopify.dev/api/admin/rest/reference/sales-channels/payment)
```php
```

### [Payout](https://shopify.dev/api/admin/rest/reference/shopify_payments/payout)
```php
```

### [Policy](https://shopify.dev/api/admin/rest/reference/store-properties/policy)
```php
```

### [PriceRule](https://shopify.dev/api/admin/rest/reference/discounts/pricerule)
```php
array getPriceRules(array $args = []);
array getPriceRule(array $args = []);
array createPriceRule(array $args = []);
array updatePriceRule(array $args = []);
array deletePriceRule(array $args = []);
```

### [Product](https://shopify.dev/api/admin/rest/reference/products/product)
```php
array getProducts(array $args = []);
int countProducts(array $args = []);
array getProduct(array $args = []);
array getProductMetafields(array $args = []);
array createProduct(array $args = []);
array updateProduct(array $args = []);
array deleteProduct(array $args = []);
```

### [Product Image](https://shopify.dev/api/admin/rest/reference/products/product-image)
```php
array getProductImages(array $args = []);
int countProductImages(array $args = []);
array getProductImage(array $args = []);
array createProductImage(array $args = []);
array updateProductImage(array $args = []);
array deleteProductImage(array $args = []);
```

### [Product ResourceFeedback](https://shopify.dev/api/admin/rest/reference/sales-channels/productresourcefeedback)
```php
```

### [Product Variant](https://shopify.dev/api/admin/rest/reference/products/product-variant)
```php
array getProductVariants(array $args = []);
int countProductVariants(array $args = []);
array getProductVariant(array $args = []);
array getProductVariantMetafields(array $args = []);
array createProductVariant(array $args = []);
array updateProductVariant(array $args = []);
array deleteProductVariant(array $args = []);
```

### [ProductListing](https://shopify.dev/api/admin/rest/reference/sales-channels/productlisting)
```php
```

### [Province](https://shopify.dev/api/admin/rest/reference/store-properties/province)
```php
```

### [RecurringApplicationCharge](https://shopify.dev/api/admin/rest/reference/billing/recurringapplicationcharge)
```php
array getRecurringApplicationCharges(array $args = []);
array getRecurringApplicationCharge(array $args = []);
array createRecurringApplicationCharge(array $args = []);
array updateRecurringApplicationCharge(array $args = []);
array deleteRecurringApplicationCharge(array $args = []);
```

### [Redirect](https://shopify.dev/api/admin/rest/reference/online-store/redirect)
```php
array getRedirects(array $args = []);
int countRedirects(array $args = []);
array getRedirect(array $args = []);
array createRedirect(array $args = []);
array updateRedirect(array $args = []);
array deleteRedirect(array $args = []);
```

### [Refund](https://shopify.dev/api/admin/rest/reference/orders/refund)
```php
array getRefunds(array $args = []);
array getRefund(array $args = []);
array calculateRefund(array $args = []);
array createRefund(array $args = []);
```

### [Report](https://shopify.dev/api/admin/rest/reference/analytics/report)
```php
array getReports(array $args = []);
array getReport(array $args = []);
array createReport(array $args = []);
array updateReport(array $args = []);
array deleteReport(array $args = []);
```

### [ResourceFeedback](https://shopify.dev/api/admin/rest/reference/sales-channels/resourcefeedback)
```php
```

### [ScriptTag](https://shopify.dev/api/admin/rest/reference/online-store/scripttag)
```php
array getScriptTags(array $args = []);
int countScriptTags(array $args = []);
array getScriptTag(array $args = []);
array createScriptTag(array $args = []);
array updateScriptTag(array $args = []);
array deleteScriptTag(array $args = []);
```

### [ShippingZone](https://shopify.dev/api/admin/rest/reference/store-properties/shippingzone)
```php
array getShippingZones(array $args = []);
```

### [Shop](https://shopify.dev/api/admin/rest/reference/store-properties/shop)
```php
array getShop(array $args = []);
```

### [SmartCollection](https://shopify.dev/api/admin/rest/reference/products/smartcollection)
```php
array getSmartCollections(array $args = []);
int countSmartCollections(array $args = []);
array getSmartCollection(array $args = []);
array createSmartCollection(array $args = []);
array updateSmartCollection(array $args = []);
array deleteSmartCollection(array $args = []);
```

### [StorefrontAccessToken](https://shopify.dev/api/admin/rest/reference/access/storefrontaccesstoken)
```php
array getStorefrontAccessTokens(array $args = []);
array createStorefrontAccessToken(array $args = []);
array deleteStorefrontAccessToken(array $args = []);
```

### [TenderTransaction](https://shopify.dev/api/admin/rest/reference/tendertransaction)
```php
```

### [Theme](https://shopify.dev/api/admin/rest/reference/online-store/theme)
```php
array getThemes(array $args = []);
array getTheme(array $args = []);
array createTheme(array $args = []);
array updateTheme(array $args = []);
array deleteTheme(array $args = []);
```

### [Transaction](https://shopify.dev/api/admin/rest/reference/orders/transaction)
```php
array getTransactions(array $args = []);
int countTransactions(array $args = []);
array getTransaction(array $args = []);
array createTransaction(array $args = []);
```

### [UsageCharge](https://shopify.dev/api/admin/rest/reference/billing/usagecharge)
```php
array getUsageCharges(array $args = []);
array getUsageCharge(array $args = []);
array createUsageCharge(array $args = []);
```

### [User](https://shopify.dev/api/admin/rest/reference/plus/user)
```php
```

### [Webhook](https://shopify.dev/api/admin/rest/reference/events/webhook)
```php
array getWebhooks(array $args = []);
int countWebhooks(array $args = []);
array getWebhook(array $args = []);
array createWebhook(array $args = []);
array updateWebhook(array $args = []);
array deleteWebhook(array $args = []);
```

### Other Methods
```php
array createDelegateAccessToken(array $args = []);
```

### Iterator Methods
```php
Traversable getAbandonedCheckoutsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getArticlesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getBalanceTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCollectsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCollectionProductsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCollectionListingProductIdsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCommentsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCustomCollectionsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCustomerAddressesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable searchCustomersIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCustomersIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getCustomerSavedSearchesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getDiscountCodesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getDisputesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getDraftOrdersIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getEventsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getFulfillmentsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getGiftCardsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable searchGiftCardsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getInventoryItemsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getInventoryLevelsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getLocationInventoryLevelsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getMarketingEventsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getOrdersIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getOrderRisksIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getPagesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getPayoutsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getPriceRulesIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getProductsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getProductListingsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getProductVariantsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getRedirectsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getRefundsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getReportsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getScriptTagsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getSmartCollectionsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getTenderTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getUsersIterator(array $commandArgs = [], array $iteratorArgs = []);
Traversable getWebhooksIterator(array $commandArgs = [], array $iteratorArgs = []);
```