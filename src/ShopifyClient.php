<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace CbzShopify;

use Generator;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Command\Result;
use GuzzleHttp\Handler\CurlHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\ToArrayInterface;
use GuzzleHttp\Command\Guzzle\Serializer;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use CbzShopify\Exception\RuntimeException;
use GuzzleHttp\Command\Guzzle\GuzzleClient;;
use GuzzleHttp\Command\Exception\CommandException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Shopify client used to interact with the Shopify API
 *
 * It also offers several utility, to allow generate URLs needed for the OAuth dance, as well
 * as validating incoming request and webhooks
 *
 * @author Zachary Miller
 * @author Michaël Gallego
 *
 * Abandoned Checkouts:
 * @method int countAbandonedCheckouts(array $args = []); { @command Shopify CountAbandonedCheckouts }
 * @method array getAbandonedCheckouts(array $args = []) { @command Shopify GetAbandonedCheckouts }
 *
 * AccessScope:
 * @method array getAccessScopes(array $args = []) { @command Shopify GetAccessScopes }
 *
 * ApplicationCharge:
 * @method array createApplicationCharge(array $args = []) { @command Shopify CreateApplicationCharge }
 * @method array getApplicationCharges(array $args = []) { @command Shopify GetApplicationCharges }
 * @method array getApplicationCharge(array $args = []) { @command Shopify GetApplicationCharge }
 *
 * ApplicationCredit:
 * @method array createApplicationCredit(array $args = []) { @command Shopify CreateApplicationCredit }
 * @method array getApplicationCredit(array $args = []) { @command Shopify GetApplicationCredit }
 * @method array getApplicationCredits(array $args = []) { @command Shopify GetApplicationCredits }
 *
 * Article:
 * @method array getArticles(array $args = []) { @command Shopify GetArticles }
 * @method int countArticles(array $args = []) { @command Shopify CountArticles }
 * @method array getArticle(array $args = []) { @command Shopify GetArticle }
 * @method array createArticle(array $args = []) { @command Shopify CreateArticle }
 * @method array updateArticle(array $args = []) { @command Shopify UpdateArticle }
 * @method array getArticleAuthors(array $args = []) { @command Shopify GetArticleAuthors }
 * @method array getArticleTags(array $args = []) { @command Shopify GetArticleTags }
 * @method array deleteArticle(array $args = []) { @command Shopify DeleteArticle }
 *
 * Asset:
 * @method array getAssets(array $args = []) { @command Shopify GetAssets }
 * @method array getAsset(array $args = []) { @command Shopify GetAsset }
 * @method array createAsset(array $args = []) { @command Shopify CreateAsset }
 * @method array updateAsset(array $args = []) { @command Shopify UpdateAsset }
 * @method array deleteAsset(array $args = []) { @command Shopify DeleteAsset }
 *
 * AssignedFulfillmentOrder:
 * @method array getAssignedFulfillmentOrders(array $args = []) { @command Shopify GetAssignedFulfillmentOrders }
 *
 * Balance:
 * @method array getBalance(array $args = []) { @command Shopify GetBalance }
 *
 * Balance Transaction:
 * @method array getBalanceTransactions(array $args = []) { @command Shopify GetBalanceTransactions }
 *
 * Blog:
 * @method array getBlogs(array $args = []) { @command Shopify GetBlogs }
 * @method int countBlogs(array $args = []) { @command Shopify CountBlogs }
 * @method array getBlog(array $args = []) { @command Shopify GetBlog }
 * @method array createBlog(array $args = []) { @command Shopify CreateBlog }
 * @method array updateBlog(array $args = []) { @command Shopify UpdateBlog }
 * @method array deleteBlog(array $args = []) { @command Shopify DeleteBlog }
 *
 * CancellationRequest:
 * @method array sendCancellationRequest(array $args = []) { @command Shopify SendCancellationRequest }
 * @method array acceptCancellationRequest(array $args = []) { @command Shopify AcceptCancellationRequest }
 * @method array rejectCancellationRequest(array $args = []) { @command Shopify RejectCancellationRequest }
 *
 * CarrierService:
 * @method array createCarrierService(array $args = []) { @command Shopify CreateCarrierService }
 * @method array updateCarrierService(array $args = []) { @command Shopify UpdateCarrierService }
 * @method array getCarrierServices(array $args = []) { @command Shopify GetCarrierServices }
 * @method array getCarrierService(array $args = []) { @command Shopify GetCarrierService }
 * @method array deleteCarrierService(array $args = []) { @command Shopify DeleteCarrierService }
 *
 * Checkout:
 * @method array createCheckout(array $args = []) { @command Shopify CreateCheckout }
 * @method array completeCheckout(array $args = []) { @command Shopify CompleteCheckout }
 * @method array getCheckout(array $args = []) { @command Shopify GetCheckout }
 * @method array updateCheckout(array $args = []) { @command Shopify UpdateCheckout }
 * @method array getCheckoutShippingRates(array $args = []) { @command Shopify GetCheckoutShippingRates }
 *
 * Collect:
 * @method array createCollect(array $args = []) { @command Shopify CreateCollect }
 * @method array deleteCollect(array $args = []) { @command Shopify DeleteCollect }
 * @method array getCollects(array $args = []) { @command Shopify GetCollects }
 * @method int countCollects(array $args = []) { @command Shopify CountCollects }
 * @method array getCollect(array $args = []) { @command Shopify GetCollect }
 *
 * Collection:
 * @method array getCollection(array $args = []) { @command Shopify GetCollection }
 * @method array getCollectionProducts(array $args = []) { @command Shopify GetCollectionProducts }
 *
 * CollectionListing:
 * @method array getCollectionListings(array $args = []) { @command Shopify GetCollectionListings }
 * @method array getCollectionListingProductIds(array $args = []) { @command Shopify GetCollectionListingProductIds }
 * @method array getCollectionListing(array $args = []) { @command Shopify GetCollectionListing }
 * @method array createCollectionListing(array $args = []) { @command Shopify CreateCollectionListing }
 * @method array getCollectionListing(array $args = []) { @command Shopify GetCollectionListing }
 *
 * Comment:
 * @method array getComments(array $args = []) { @command Shopify GetComments }
 * @method int countComments(array $args = []) { @command Shopify CountComments }
 * @method array getComment(array $args = []) { @command Shopify GetComment }
 * @method array createComment(array $args = []) { @command Shopify CreateComment }
 * @method array updateComment(array $args = []) { @command Shopify UpdateComment }
 * @method array spamComment(array $args = []) { @command Shopify SpamComment }
 * @method array unspamComment(array $args = []) { @command Shopify UnspamComment }
 * @method array approveComment(array $args = []) { @command Shopify ApproveComment }
 * @method array removeComment(array $args = []) { @command Shopify RemoveComment }
 * @method array restoreComment(array $args = []) { @command Shopify RestoreComment }
 *
 * Country:
 * @method array getCountries(array $args = []) { @command Shopify GetCountries }
 * @method int countCountries(array $args = []) { @command Shopify CountCountries }
 * @method array getCountry(array $args = []) { @command Shopify GetCountry }
 * @method array createCountry(array $args = []) { @command Shopify CreateCountry }
 * @method array updateCountry(array $args = []) { @command Shopify UpdateCountry }
 * @method array deleteCountry(array $args = []) { @command Shopify DeleteCountry }
 *
 * Currency:
 * @method array getCurrencies(array $args = []) { @command Shopify GetCurrencies }
 *
 * CustomCollection:
 * @method array getCustomCollections(array $args = []) { @command Shopify GetCustomCollections }
 * @method int countCustomCollections(array $args = []) { @command Shopify CountCustomCollections }
 * @method array getCustomCollection(array $args = []) { @command Shopify GetCustomCollection }
 * @method array createCustomCollection(array $args = []) { @command Shopify CreateCustomCollection }
 * @method array updateCustomCollection(array $args = []) { @command Shopify UpdateCustomCollection }
 * @method array deleteCustomCollection(array $args = []) { @command Shopify DeleteCustomCollection }
 *
 * Customer:
 * @method array getCustomers(array $args = []) { @command Shopify GetCustomers }
 * @method array searchCustomers(array $args = []) { @command Shopify SearchCustomers }
 * @method array getCustomer(array $args = []) { @command Shopify GetCustomer }
 * @method array createCustomer(array $args = []) { @command Shopify CreateCustomer }
 * @method array updateCustomer(array $args = []) { @command Shopify UpdateCustomer }
 * @method array sendCustomerActivationUrl(array $args = []) { @command Shopify SendCustomerActivationUrl }
 * @method array sendCustomerInvite(array $args = []) { @command Shopify SendCustomerInvite }
 * @method array deleteCustomer(array $args = []) { @command Shopify DeleteCustomer }
 * @method int countCustomers(array $args = []) { @command Shopify CountCustomers }
 * @method array getCustomerOrders(array $args = []) { @command Shopify GetCustomerOrders }
 *
 * Customer Address:
 * @method array getCustomerAddresses(array $args = []) { @command Shopify GetCustomerAddresses }
 * @method array getCustomerAddress(array $args = []) { @command Shopify GetCustomerAddress }
 * @method array createCustomerAddress(array $args = []) { @command Shopify CreateCustomerAddress }
 * @method array updateCustomerAddress(array $args = []) { @command Shopify UpdateCustomerAddress }
 * @method array deleteCustomerAddress(array $args = []) { @command Shopify DeleteCustomerAddress }
 * @method array updateCustomerAddresses(array $args = []) { @command Shopify UpdateCustomerAddresses }
 * @method array setDefaultCustomerAddress(array $args = []) { @command Shopify SetDefaultCustomerAddress }
 *
 * CustomerSavedSearch:
 * @method array getCustomerSavedSearches(array $args = []) { @command Shopify GetCustomerSavedSearches }
 * @method int countCustomerSavedSearches(array $args = []) { @command Shopify CountCustomerSavedSearches }
 * @method array getCustomerSavedSearch(array $args = []) { @command Shopify GetCustomerSavedSearch }
 * @method array getCustomerSavedSearchCustomers(array $args = []) { @command Shopify GetCustomerSavedSearchCustomers }
 * @method array createCustomerSavedSearch(array $args = []) { @command Shopify CreateCustomerSavedSearch }
 * @method array updateCustomerSavedSearch(array $args = []) { @command Shopify UpdateCustomerSavedSearch }
 * @method array deleteCustomerSavedSearch(array $args = []) { @command Shopify DeleteCustomerSavedSearch }
 *
 * Deprecated API Calls:
 * @method array getDeprecatedApiCalls(array $args = []) { @command Shopify GetDeprecatedApiCalls }
 *
 * DiscountCode:
 * @method array createDiscountCode(array $args = []) { @command Shopify CreateDiscountCode }
 * @method array updateDiscountCode(array $args = []) { @command Shopify UpdateDiscountCode }
 * @method array getDiscountCodes(array $args = []) { @command Shopify GetDiscountCodes }
 * @method array getDiscountCode(array $args = []) { @command Shopify GetDiscountCode }
 * @method array lookupDiscountCode(array $args = []) { @command Shopify LookupDiscountCode }
 * @method int countDiscountCodes(array $args = []) { @command Shopify CountDiscountCodes }
 * @method array deleteDiscountCode(array $args = []) { @command Shopify DeleteDiscountCode }
 * @method array createDiscountCodeBatch(array $args = []) { @command Shopify CreateDiscountCodeBatch }
 * @method array getDiscountCodeBatch(array $args = []) { @command Shopify GetDiscountCodeBatch }
 * @method array getDiscountCodeBatchDiscountCodes(array $args = []) { @command Shopify GetDiscountCodeBatchDiscountCodes }
 *
 * Dispute:
 * @method array getDisputes(array $args = []) { @command Shopify GetDisputes }
 * @method array getDispute(array $args = []) { @command Shopify GetDispute }
 *
 * DraftOrder:
 * @method array createDraftOrder(array $args = []) { @command Shopify CreateDraftOrder }
 * @method array updateDraftOrder(array $args = []) { @command Shopify UpdateDraftOrder }
 * @method array getDraftOrders(array $args = []) { @command Shopify GetDraftOrders }
 * @method array getDraftOrder(array $args = []) { @command Shopify GetDraftOrder }
 * @method int countDraftOrders(array $args = []) { @command Shopify CountDraftOrders }
 * @method array sendDraftOrderInvoice(array $args = []) { @command Shopify SendDraftOrderInvoice }
 * @method array deleteDraftOrder(array $args = []) { @command Shopify DeleteDraftOrder }
 * @method array completeDraftOrder(array $args = []) { @command Shopify CompleteDraftOrder }
 *
 * Event:
 * @method array getEvents(array $args = []) { @command Shopify GetEvents }
 * @method array getEvent(array $args = []) { @command Shopify GetEvent }
 * @method int countEvents(array $args = []) { @command Shopify CountEvents }
 *
 * Fulfillment:
 * @method array getFulfillments(array $args = []) { @command Shopify GetFulfillments }
 * @method array getFulfillmentOrderFulfillments(array $args = []) { @command Shopify GetFulfillmentOrderFulfillments }
 * @method int countFulfillments(array $args = []) { @command Shopify CountFulfillments }
 * @method array getFulfillment(array $args = []) { @command Shopify GetFulfillment }
 * @method array createFulfillment(array $args = []) { @command Shopify CreateFulfillment }
 * @method array createFulfillmentOrderFulfillment(array $args = []) { @command Shopify CreateFulfillmentOrderFulfillment }
 * @method array updateFulfillment(array $args = []) { @command Shopify UpdateFulfillment }
 * @method array updateFulfillmentOrderFulfillment(array $args = []) { @command Shopify UpdateFulfillmentOrderFulfillment }
 * @method array completeFulfillment(array $args = []) { @command Shopify CompleteFulfillment }
 * @method array openFulfillment(array $args = []) { @command Shopify OpenFulfillment }
 * @method array cancelFulfillment(array $args = []) { @command Shopify CancelFulfillment }
 * @method array cancelFulfillmentOrderFulfillment(array $args = []) { @command Shopify CancelFulfillmentOrderFulfillment }
 *
 * FulfillmentEvent:
 * @method array getFulfillmentEvents(array $args = []) { @command Shopify GetFulfillmentEvents }
 * @method array getFulfillmentEvent(array $args = []) { @command Shopify GetFulfillmentEvent }
 * @method array createFulfillmentEvent(array $args = []) { @command Shopify CreateFulfillmentEvent }
 * @method array deleteFulfillmentEvent(array $args = []) { @command Shopify DeleteFulfillmentEvent }
 *
 * FulfillmentOrder:
 * @method array getFulfillmentOrders(array $args = []) { @command Shopify GetFulfillmentOrders }
 * @method array getFulfillmentOrder(array $args = []) { @command Shopify GetFulfillmentOrder }
 * @method int cancelFulfillmentOrder(array $args = []) { @command Shopify CancelFulfillmentOrder }
 * @method array closeFulfillmentOrder(array $args = []) { @command Shopify CloseFulfillmentOrder }
 * @method array moveFulfillmentOrder(array $args = []) { @command Shopify MoveFulfillmentOrder }
 * @method array openFulfillmentOrder(array $args = []) { @command Shopify OpenFulfillmentOrder }
 * @method array rescheduleFulfillmentOrder(array $args = []) { @command Shopify RescheduleFulfillmentOrder }
 *
 * FulfillmentRequest:
 * @method array sendFulfillmentRequest(array $args = []) { @command Shopify SendFulfillmentRequest }
 * @method array acceptFulfillmentRequest(array $args = []) { @command Shopify AcceptFulfillmentRequest }
 * @method array rejectFulfillmentRequest(array $args = []) { @command Shopify RejectFulfillmentRequest }
 *
 * FulfillmentService:
 * @method array getFulfillmentServices(array $args = []) { @command Shopify GetFulfillmentServices }
 * @method array createFulfillmentService(array $args = []) { @command Shopify CreateFulfillmentService }
 * @method array getFulfillmentService(array $args = []) { @command Shopify GetFulfillmentService }
 * @method array updateFulfillmentService(array $args = []) { @command Shopify UpdateFulfillmentService }
 * @method array deleteFulfillmentService(array $args = []) { @command Shopify DeleteFulfillmentService }
 *
 * GiftCard:
 * @method array getGiftCards(array $args = []) { @command Shopify GetGiftCards }
 * @method array getGiftCard(array $args = []) { @command Shopify GetGiftCard }
 * @method int countGiftCards(array $args = []) { @command Shopify CountGiftCards }
 * @method array createGiftCard(array $args = []) { @command Shopify CreateGiftCard }
 * @method array updateGiftCard(array $args = []) { @command Shopify CreateGiftCard }
 * @method array disableGiftCard(array $args = []) { @command Shopify DisableGiftCard }
 * @method array searchGiftCards(array $args = []) { @command Shopify SearchGiftCards }
 *
 * InventoryItem:
 * @method array getInventoryItems(array $args = []) { @command Shopify GetInventoryItems }
 * @method array getInventoryItem(array $args = []) { @command Shopify GetInventoryItem }
 * @method array updateInventoryItem(array $args = []) { @command Shopify UpdateInventoryItem }
 *
 * InventoryLevel:
 * @method array getInventoryLevels(array $args = []) { @command Shopify GetInventoryLevels }
 * @method array adjustInventoryLevel(array $args = []) { @command Shopify AdjustInventoryLevel }
 * @method array deleteInventoryLevel(array $args = []) { @command Shopify DeleteInventoryLevel }
 * @method array connectInventoryLevel(array $args = []) { @command Shopify ConnectInventoryLevel }
 * @method array setInventoryLevel(array $args = []) { @command Shopify SetInventoryLevel }
 *
 * Location:
 * @method array getLocations(array $args = []) { @command Shopify GetLocations }
 * @method array getLocation(array $args = []) { @command Shopify GetLocation }
 * @method int countLocations(array $args = []) { @command Shopify CountLocations }
 * @method array getLocationInventoryLevels(array $args = []) { @command Shopify GetLocationInventoryLevels }
 *
 * LocationsForMove:
 * @method array getLocationsForMove(array $args = []) { @command Shopify GetLocationsForMove }
 *
 * MarketingEvent:
 * @method array getMarketingEvents(array $args = []) { @command Shopify GetMarketingEvents }
 * @method int countMarketingEvents(array $args = []) { @command Shopify CountMarketingEvents }
 * @method array getMarketingEvent(array $args = []) { @command Shopify GetMarketingEvent }
 * @method array createMarketingEvent(array $args = []) { @command Shopify CreateMarketingEvent }
 * @method array updateMarketingEvent(array $args = []) { @command Shopify UpdateMarketingEvent }
 * @method array deleteMarketingEvent(array $args = []) { @command Shopify DeleteMarketingEvent }
 * @method array createMarketingEventEngagements(array $args = []) { @command Shopify CreateMarketingEventEngagements }
 *
 * Metafield:
 * @method array getArticleMetafields(array $args = []) { @command Shopify GetArticleMetafields }
 * @method array getBlogMetafields(array $args = []) { @command Shopify GetBlogMetafields }
 * @method array getCollectionMetafields(array $args = []) { @command Shopify GetCollectionMetafields }
 * @method array getCustomerMetafields(array $args = []) { @command Shopify GetCustomerMetafields }
 * @method array getDraftOrderMetafields(array $args = []) { @command Shopify GetDraftOrderMetafields }
 * @method array getOrderMetafields(array $args = []) { @command Shopify GetOrderMetafields }
 * @method array getPageMetafields(array $args = []) { @command Shopify GetPageMetafields }
 * @method array getProductMetafields(array $args = []) { @command Shopify GetProductMetafields }
 * @method array getProductVariantMetafields(array $args = []) { @command Shopify GetProductVariantMetafields }
 * @method array getProductImageMetafields(array $args = []) { @command Shopify GetProductImageMetafields }
 * @method array getShopMetafields(array $args = []) { @command Shopify GetShopMetafields }
 * @method int countArticleMetafields(array $args = []) { @command Shopify CountArticleMetafields }
 * @method int countBlogMetafields(array $args = []) { @command Shopify CountBlogMetafields }
 * @method int countCollectionMetafields(array $args = []) { @command Shopify CountCollectionMetafields }
 * @method int countCustomerMetafields(array $args = []) { @command Shopify CountCustomerMetafields }
 * @method int countDraftOrderMetafields(array $args = []) { @command Shopify CountDraftOrderMetafields }
 * @method int countOrderMetafields(array $args = []) { @command Shopify CountOrderMetafields }
 * @method int countPageMetafields(array $args = []) { @command Shopify CountPageMetafields }
 * @method int countProductMetafields(array $args = []) { @command Shopify CountProductMetafields }
 * @method int countProductVariantMetafields(array $args = []) { @command Shopify CountProductVariantMetafields }
 * @method int countProductImageMetafields(array $args = []) { @command Shopify CountProductImageMetafields }
 * @method int countShopMetafields(array $args = []) { @command Shopify CountShopMetafields }
 * @method array getArticleMetafield(array $args = []) { @command Shopify GetArticleMetafield }
 * @method array getBlogMetafield(array $args = []) { @command Shopify GetBlogMetafield }
 * @method array getCollectionMetafield(array $args = []) { @command Shopify GetCollectionMetafield }
 * @method array getCustomerMetafield(array $args = []) { @command Shopify GetCustomerMetafield }
 * @method array getDraftOrderMetafield(array $args = []) { @command Shopify GetDraftOrderMetafield }
 * @method array getOrderMetafield(array $args = []) { @command Shopify GetOrderMetafield }
 * @method array getPageMetafield(array $args = []) { @command Shopify GetPageMetafield }
 * @method array getProductMetafield(array $args = []) { @command Shopify GetProductMetafield }
 * @method array getProductVariantMetafield(array $args = []) { @command Shopify GetProductVariantMetafield }
 * @method array getProductImageMetafield(array $args = []) { @command Shopify GetProductImageMetafield }
 * @method array getShopMetafield(array $args = []) { @command Shopify GetShopMetafield }
 * @method array createArticleMetafield(array $args = []) { @command Shopify CreateArticleMetafield }
 * @method array createBlogMetafield(array $args = []) { @command Shopify CreateBlogMetafield }
 * @method array createCollectionMetafield(array $args = []) { @command Shopify CreateCollectionMetafield }
 * @method array createCustomerMetafield(array $args = []) { @command Shopify CreateCustomerMetafield }
 * @method array createDraftOrderMetafield(array $args = []) { @command Shopify CreateDraftOrderMetafield }
 * @method array createOrderMetafield(array $args = []) { @command Shopify CreateOrderMetafield }
 * @method array createPageMetafield(array $args = []) { @command Shopify CreatePageMetafield }
 * @method array createProductMetafield(array $args = []) { @command Shopify CreateProductMetafield }
 * @method array createProductVariantMetafield(array $args = []) { @command Shopify CreateProductVariantMetafield }
 * @method array createProductImageMetafield(array $args = []) { @command Shopify CreateProductImageMetafield }
 * @method array createShopMetafield(array $args = []) { @command Shopify CreateShopMetafield }
 * @method array updateArticleMetafield(array $args = []) { @command Shopify UpdateArticleMetafield }
 * @method array updateBlogMetafield(array $args = []) { @command Shopify UpdateBlogMetafield }
 * @method array updateCollectionMetafield(array $args = []) { @command Shopify UpdateCollectionMetafield }
 * @method array updateCustomerMetafield(array $args = []) { @command Shopify UpdateCustomerMetafield }
 * @method array updateDraftOrderMetafield(array $args = []) { @command Shopify UpdateDraftOrderMetafield }
 * @method array updateOrderMetafield(array $args = []) { @command Shopify UpdateOrderMetafield }
 * @method array updatePageMetafield(array $args = []) { @command Shopify UpdatePageMetafield }
 * @method array updateProductMetafield(array $args = []) { @command Shopify UpdateProductMetafield }
 * @method array updateProductVariantMetafield(array $args = []) { @command Shopify UpdateProductVariantMetafield }
 * @method array updateProductImageMetafield(array $args = []) { @command Shopify UpdateProductImageMetafield }
 * @method array updateShopMetafield(array $args = []) { @command Shopify UpdateShopMetafield }
 * @method array deleteArticleMetafield(array $args = []) { @command Shopify DeleteArticleMetafield }
 * @method array deleteBlogMetafield(array $args = []) { @command Shopify DeleteBlogMetafield }
 * @method array deleteCollectionMetafield(array $args = []) { @command Shopify DeleteCollectionMetafield }
 * @method array deleteCustomerMetafield(array $args = []) { @command Shopify DeleteCustomerMetafield }
 * @method array deleteDraftOrderMetafield(array $args = []) { @command Shopify DeleteDraftOrderMetafield }
 * @method array deleteOrderMetafield(array $args = []) { @command Shopify DeleteOrderMetafield }
 * @method array deletePageMetafield(array $args = []) { @command Shopify DeletePageMetafield }
 * @method array deleteProductMetafield(array $args = []) { @command Shopify DeleteProductMetafield }
 * @method array deleteProductVariantMetafield(array $args = []) { @command Shopify DeleteProductVariantMetafield }
 * @method array deleteProductImageMetafield(array $args = []) { @command Shopify DeleteProductImageMetafield }
 *
 * MobilePlatformApplication:
 * @method array getMobilePlatformApplications(array $args = []) { @command Shopify GetMobilePlatformApplications }
 * @method array createMobilePlatformApplication(array $args = []) { @command Shopify CreateMobilePlatformApplication }
 * @method array getMobilePlatformApplication(array $args = []) { @command Shopify GetMobilePlatformApplication }
 * @method array updateMobilePlatformApplication(array $args = []) { @command Shopify UpdateMobilePlatformApplication }
 * @method array deleteMobilePlatformApplication(array $args = []) { @command Shopify DeleteMobilePlatformApplication }
 *
 * Order:
 * @method array getOrders(array $args = []) { @command Shopify GetOrders }
 * @method array getOrder(array $args = []) { @command Shopify GetOrder }
 * @method int countOrders(array $args = []) { @command Shopify CountOrders }
 * @method array closeOrder(array $args = []) { @command Shopify CloseOrder }
 * @method array openOrder(array $args = []) { @command Shopify OpenOrder }
 * @method array cancelOrder(array $args = []) { @command Shopify CancelOrder }
 * @method array createOrder(array $args = []) { @command Shopify CreateOrder }
 * @method array updateOrder(array $args = []) { @command Shopify UpdateOrder }
 * @method array deleteOrder(array $args = []) { @command Shopify DeleteOrder }
 *
 * Order Risk:
 * @method array createOrderRisk(array $args = []) { @command Shopify CreateOrderRisk }
 * @method array getOrderRisks(array $args = []) { @command Shopify GetOrderRisks }
 * @method array getOrderRisk(array $args = []) { @command Shopify GetOrderRisk }
 * @method array updateOrderRisk(array $args = []) { @command Shopify UpdateOrderRisk }
 * @method array deleteOrderRisk(array $args = []) { @command Shopify DeleteOrderRisk }
 *
 * Page:
 * @method array getPages(array $args = []) { @command Shopify GetPages }
 * @method int countPages(array $args = []) { @command Shopify CountPages }
 * @method array getPage(array $args = []) { @command Shopify GetPage }
 * @method array createPage(array $args = []) { @command Shopify CreatePage }
 * @method array updatePage(array $args = []) { @command Shopify UpdatePage }
 * @method array deletePage(array $args = []) { @command Shopify DeletePage }
 *
 * Payment:
 * @method array storeCreditCard(array $args = []) { @command Shopify StoreCreditCard }
 * @method array createPayment(array $args = []) { @command Shopify CreatePayment }
 * @method array getPayments(array $args = []) { @command Shopify GetPayments }
 * @method array getPayment(array $args = []) { @command Shopify GetPayment }
 * @method int countPayments(array $args = []) { @command Shopify CountPayments }
 *
 * Payout:
 * @method array getPayouts(array $args = []) { @command Shopify GetPayouts }
 * @method array getPayout(array $args = []) { @command Shopify GetPayout }
 *
 * Policy:
 * @method array getPolicies(array $args = []) { @command Shopify GetPolicies }
 *
 * PriceRule:
 * @method array createPriceRule(array $args = []) { @command Shopify CreatePriceRule }
 * @method array updatePriceRule(array $args = []) { @command Shopify UpdatePriceRule }
 * @method array getPriceRules(array $args = []) { @command Shopify GetPriceRules }
 * @method array getPriceRule(array $args = []) { @command Shopify GetPriceRule }
 * @method int countPriceRules(array $args = []) { @command Shopify CountPriceRules }
 * @method array deletePriceRule(array $args = []) { @command Shopify DeletePriceRule }
 *
 * Product:
 * @method array getProducts(array $args = []) { @command Shopify GetProducts }
 * @method int countProducts(array $args = []) { @command Shopify CountProducts }
 * @method array getProduct(array $args = []) { @command Shopify GetProduct }
 * @method array createProduct(array $args = []) { @command Shopify CreateProduct }
 * @method array updateProduct(array $args = []) { @command Shopify UpdateProduct }
 * @method array deleteProduct(array $args = []) { @command Shopify DeleteProduct }
 *
 * Product Image:
 * @method array getProductImages(array $args = []) { @command Shopify GetProductImages }
 * @method int countProductImages(array $args = []) { @command Shopify CountProductImages }
 * @method array getProductImage(array $args = []) { @command Shopify GetProductImage }
 * @method array createProductImage(array $args = []) { @command Shopify CreateProductImage }
 * @method array updateProductImage(array $args = []) { @command Shopify UpdateProductImage }
 * @method array deleteProductImage(array $args = []) { @command Shopify DeleteProductImage }
 *
 * Product ResourceFeedback:
 * @method array createProductResourceFeedback(array $args = []) { @command Shopify CreateProductResourceFeedback }
 * @method array getProductResourceFeedbacks(array $args = []) { @command Shopify GetProductResourceFeedbacks }
 *
 * Product Variant:
 * @method array getProductVariants(array $args = []) { @command Shopify GetProductVariants }
 * @method int countProductVariants(array $args = []) { @command Shopify CountProductVariants }
 * @method array getProductVariant(array $args = []) { @command Shopify GetProductVariant }
 * @method array createProductVariant(array $args = []) { @command Shopify CreateProductVariant }
 * @method array updateProductVariant(array $args = []) { @command Shopify UpdateProductVariant }
 * @method array deleteProductVariant(array $args = []) { @command Shopify DeleteProductVariant }
 *
 * ProductListing:
 * @method array getProductListings(array $args = []) { @command Shopify GetProductListings }
 * @method array getProductListingIds(array $args = []) { @command Shopify GetProductListingIds }
 * @method int countProductListings(array $args = []) { @command Shopify CountProductListings }
 * @method array getProductListing(array $args = []) { @command Shopify GetProductListing }
 * @method array createProductListing(array $args = []) { @command Shopify CreateProductListing }
 * @method array deleteProductListing(array $args = []) { @command Shopify DeleteProductListing }
 *
 * Province:
 * @method array getProvinces(array $args = []) { @command Shopify GetProvinces }
 * @method int countProvinces(array $args = []) { @command Shopify CountProvinces }
 * @method array getProvince(array $args = []) { @command Shopify GetProvince }
 * @method array updateProvince(array $args = []) { @command Shopify UpdateProvince }
 *
 * RecurringApplicationCharge:
 * @method array createRecurringApplicationCharge(array $args = []) { @command Shopify CreateRecurringApplicationCharge }
 * @method array getRecurringApplicationCharge(array $args = []) { @command Shopify GetRecurringApplicationCharge }
 * @method array getRecurringApplicationCharges(array $args = []) { @command Shopify GetRecurringApplicationCharges }
 * @method array deleteRecurringApplicationCharge(array $args = []) { @command Shopify DeleteRecurringApplicationCharge }
 * @method array updateRecurringApplicationCharge(array $args = []) { @command Shopify UpdateRecurringApplicationCharge }
 *
 * Redirect:
 * @method array getRedirects(array $args = []) { @command Shopify GetRedirects }
 * @method int countRedirects(array $args = []) { @command Shopify CountRedirects }
 * @method array getRedirect(array $args = []) { @command Shopify GetRedirect }
 * @method array createRedirect(array $args = []) { @command Shopify CreateRedirect }
 * @method array updateRedirect(array $args = []) { @command Shopify UpdateRedirect }
 * @method array deleteRedirect(array $args = []) { @command Shopify DeleteRedirect }
 *
 * Refund:
 * @method array getRefunds(array $args = []) { @command Shopify GetRefunds }
 * @method array getRefund(array $args = []) { @command Shopify GetRefund }
 * @method array calculateRefund(array $args = []) { @command Shopify CalculateRefund }
 * @method array createRefund(array $args = []) { @command Shopify CreateRefund }
 *
 * Report:
 * @method array getReports(array $args = []) { @command Shopify GetReports }
 * @method array getReport(array $args = []) { @command Shopify GetReport }
 * @method array createReport(array $args = []) { @command Shopify CreateReport }
 * @method array updateReport(array $args = []) { @command Shopify UpdateReport }
 * @method array deleteReport(array $args = []) { @command Shopify DeleteReport }
 *
 * ResourceFeedback:
 * @method array createResourceFeedback(array $args = []) { @command Shopify CreateResourceFeedback }
 * @method array getResourceFeedbacks(array $args = []) { @command Shopify GetResourceFeedbacks }
 *
 * ScriptTag:
 * @method array getScriptTags(array $args = []) { @command Shopify GetScriptTags }
 * @method int countScriptTags(array $args = []) { @command Shopify CountScriptTags }
 * @method array getScriptTag(array $args = []) { @command Shopify GetScriptTag }
 * @method array createScriptTag(array $args = []) { @command Shopify CreateScriptTag }
 * @method array updateScriptTag(array $args = []) { @command Shopify UpdateScriptTag }
 * @method array deleteScriptTag(array $args = []) { @command Shopify DeleteScriptTag }
 *
 * ShippingZone:
 * @method array getShippingZones(array $args = []) { @command Shopify GetShippingZones }
 *
 * Shop:
 * @method array getShop(array $args = []) { @command Shopify GetShop }
 *
 * SmartCollection:
 * @method array getSmartCollections(array $args = []) { @command Shopify GetSmartCollections }
 * @method int countSmartCollections(array $args = []) { @command Shopify CountSmartCollections }
 * @method array getSmartCollection(array $args = []) { @command Shopify GetSmartCollection }
 * @method array createSmartCollection(array $args = []) { @command Shopify CreateSmartCollection }
 * @method array updateSmartCollection(array $args = []) { @command Shopify UpdateSmartCollection }
 * @method array opdateSmartCollectionProductOrdering(array $args = []) { @command Shopify UpdateSmartCollectionProductOrdering }
 * @method array deleteSmartCollection(array $args = []) { @command Shopify DeleteSmartCollection }
 *
 * StorefrontAccessToken:
 * @method array createStorefrontAccessToken(array $args = []) { @command Shopify CreateStorefrontAccessToken }
 * @method array deleteStorefrontAccessToken(array $args = []) { @command Shopify DeleteStorefrontAccessToken }
 * @method array getStorefrontAccessTokens(array $args = []) { @command Shopify GetStorefrontAccessTokens }
 *
 * TenderTransaction:
 * @method array getTenderTransactions(array $args = []) { @command Shopify GetTenderTransactions }
 *
 * Theme:
 * @method array getThemes(array $args = []) { @command Shopify GetThemes }
 * @method array getTheme(array $args = []) { @command Shopify GetTheme }
 * @method array createTheme(array $args = []) { @command Shopify CreateTheme }
 * @method array updateTheme(array $args = []) { @command Shopify UpdateTheme }
 * @method array deleteTheme(array $args = []) { @command Shopify DeleteTheme }
 *
 * Transaction:
 * @method array getTransactions(array $args = []) { @command Shopify GetTransactions }
 * @method int countTransactions(array $args = []) { @command Shopify CountTransactions }
 * @method array getTransaction(array $args = []) { @command Shopify GetTransaction }
 * @method array createTransaction(array $args = []) { @command Shopify CreateTransaction }
 *
 * UsageCharge:
 * @method array createUsageCharge(array $args = []) { @command Shopify CreateUsageCharge }
 * @method array getUsageCharge(array $args = []) { @command Shopify GetUsageCharge }
 * @method array getUsageCharges(array $args = []) { @command Shopify GetUsageCharges }
 *
 * User:
 * @method array getUsers(array $args = []) { @command Shopify GetUsers }
 * @method array getUser(array $args = []) { @command Shopify GetUser }
 * @method array getCurrentUser(array $args = []) { @command Shopify GetCurrentUser }
 *
 * Webhook:
 * @method array getWebhooks(array $args = []) { @command Shopify GetWebhooks }
 * @method int countWebhooks(array $args = []) { @command Shopify CountWebhooks }
 * @method array getWebhook(array $args = []) { @command Shopify GetWebhook }
 * @method array createWebhook(array $args = []) { @command Shopify CreateWebhook }
 * @method array updateWebhook(array $args = []) { @command Shopify UpdateWebhook }
 * @method array deleteWebhook(array $args = []) { @command Shopify DeleteWebhook }
 *
 * Other Methods:
 * @method array createDelegateAccessToken(array $args = []) { @command Shopify CreateDelegateAccessToken }
 *
 * Iterator Methods:
 * @method \Traversable getAbandonedCheckoutsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetAbandonedCheckouts }
 * @method \Traversable getArticlesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetArticles }
 * @method \Traversable getBalanceTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetBalanceTransactions }
 * @method \Traversable getCollectsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCollects }
 * @method \Traversable getCollectionProductsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCollectionProducts }
 * @method \Traversable getCollectionListingProductIdsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCollectionListingProductIds }
 * @method \Traversable getCommentsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetComments }
 * @method \Traversable getCustomCollectionsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCustomCollections }
 * @method \Traversable getCustomerAddressesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCustomerAddresses }
 * @method \Traversable searchCustomersIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify SearchCustomers }
 * @method \Traversable getCustomersIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCustomers }
 * @method \Traversable getCustomerSavedSearchesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCustomerSavedSearches }
 * @method \Traversable getDiscountCodesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetDiscountCodes }
 * @method \Traversable getDisputesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetDisputes }
 * @method \Traversable getDraftOrdersIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetDraftOrders }
 * @method \Traversable getEventsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetEvents }
 * @method \Traversable getFulfillmentsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetFulfillments }
 * @method \Traversable getGiftCardsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetGiftCards }
 * @method \Traversable searchGiftCardsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify SearchGiftCards }
 * @method \Traversable getInventoryItemsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetInventoryItems }
 * @method \Traversable getInventoryLevelsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetInventoryLevels }
 * @method \Traversable getLocationInventoryLevelsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetLocationInventoryLevels }
 * @method \Traversable getMarketingEventsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetMarketingEvents }
 * @method \Traversable getMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetMetafields }
 * @method \Traversable getArticleMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetArticleMetafields }
 * @method \Traversable getBlogMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetBlogMetafields }
 * @method \Traversable getCollectionMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCollectionMetafields }
 * @method \Traversable getCustomerMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetCustomerMetafields }
 * @method \Traversable getDraftOrderMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetDraftOrderMetafields }
 * @method \Traversable getOrderMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetOrderMetafields }
 * @method \Traversable getPageMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetPageMetafields }
 * @method \Traversable getProductMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProductMetafields }
 * @method \Traversable getProductVariantMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProductVariantMetafields }
 * @method \Traversable getProductImageMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProductImageMetafields }
 * @method \Traversable getShopMetafieldsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetShopMetafields }
 * @method \Traversable getOrdersIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetOrders }
 * @method \Traversable getOrderRisksIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetOrderRisks }
 * @method \Traversable getPagesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetPages }
 * @method \Traversable getPayoutsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetPayouts }
 * @method \Traversable getPriceRulesIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetPriceRules }
 * @method \Traversable getProductsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProducts }
 * @method \Traversable getProductListingsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProductListings }
 * @method \Traversable getProductVariantsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetProductVariants }
 * @method \Traversable getRedirectsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetRedirects }
 * @method \Traversable getRefundsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetRefunds }
 * @method \Traversable getReportsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetReports }
 * @method \Traversable getScriptTagsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetScriptTags }
 * @method \Traversable getSmartCollectionsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetSmartCollections }
 * @method \Traversable getTenderTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetTenderTransactions }
 * @method \Traversable getTransactionsIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetTransactions }
 * @method \Traversable getUsersIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetUsers }
 * @method \Traversable getWebhooksIterator(array $commandArgs = [], array $iteratorArgs = []) { @command Shopify GetWebhooks }
 */
class ShopifyClient
{
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * @var array
     */
    private $connectionOptions;

    /**
     * @param array             $connectionOptions
     * @param GuzzleClient|null $guzzleClient
     */
    public function __construct(array $connectionOptions, GuzzleClient $guzzleClient = null, array $guzzleMiddleware = [])
    {
        $this->validateConnectionOptions($connectionOptions);
        $this->connectionOptions = $connectionOptions;

        $this->guzzleClient = $guzzleClient ?? $this->createDefaultClient($guzzleMiddleware);
    }

    /**
     * Manually create a command (without executing it)
     *
     * This can be used to execute multiple commands in parallel by taking advantage of Guzzle multi-requests. Please
     * note that creating a command will not execute it. You will need to use the "execute" method of the Shopify client
     * to execute it and get the result
     *
     * @param  string $method
     * @param  array  $args
     * @return CommandInterface
     */
    public function getCommand(string $method, $args = []): CommandInterface
    {
        $additional_headers = $args['_additional_parameters_']['headers'] ?? [];
        $args = array_merge(
            $args,
            ['version' => $this->connectionOptions['version']],
            ['@http' => $this->getRequestArguments($additional_headers)]
        );

        return $this->guzzleClient->getCommand(ucfirst($method), $args);
    }

    /**
     * Execute a single command
     *
     * @param  CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command)
    {
        $result = $this->guzzleClient->execute($command);

        return $this->unwrapResponseData($command, $result->toArray());
    }

    /**
     * Execute multiple commands
     *
     * @param  array $commands
     * @return array
     */
    public function executeAll(array $commands = []): array
    {
        $commandResults = $this->guzzleClient->executeAll($commands);
        $results        = [];

        // Normally, results are expected to be returned in the same order as initial commands, so we can post-process them

        /** @var Result $commandResult */
        foreach ($commandResults as $index => $commandResult) {
            // If the command has failed, we store the exception, otherwise the payload
            $results[$index] = ($commandResult instanceof CommandException) ? $commandResult : $this->unwrapResponseData($commands[$index], $commandResult->toArray());
        }

        return $results;
    }

    /**
     * Directly call a specific endpoint by creating the command and executing it
     *
     * Using __call magic methods is equivalent to creating and executing a single command. It also supports using optimized
     * iterator requests by adding "Iterator" keyword to the command
     *
     * @param  $method
     * @param  array $args
     * @return array|Generator
     */
    public function __call($method, $args)
    {
        $additional_parameters           = $args[1] ?? [];
        $args                            = $args[0] ?? [];
        $args['_additional_parameters_'] = $additional_parameters;

        // Allow magic method calls for iterators (e.g. $client-><CommandName>Iterator($params))
        if (substr($method, -8) === 'Iterator') {
            return $this->iterateResources(substr($method, 0, -8), $args);
        }

        $command = $this->getCommand($method, $args);

        return $this->execute($command);
    }

    /**
     * Wrap request data around a top-key (only for POST and PUT requests)
     *
     * @internal
     * @param  CommandInterface $command
     * @return RequestInterface
     */
    public function wrapRequestData(CommandInterface $command): RequestInterface
    {
        $operation = $this->guzzleClient->getDescription()->getOperation($command->getName());
        $method    = strtolower($operation->getHttpMethod());
        $rootKey   = $operation->getData('root_key_request') ?? $operation->getData('root_key');

        $serializer = new Serializer($this->guzzleClient->getDescription()); // Create a default serializer to handle all the hard-work
        $request    = $serializer($command);

        if (($method === 'post' || $method === 'put') && $rootKey !== null) {
            $newBody = [$rootKey => json_decode($request->getBody()->getContents(), true)];
            $request = $request->withBody(Psr7\Utils::streamFor(json_encode($newBody)));
        }

        return $request;
    }

    /**
     * Decide when we should retry a request
     *
     * @internal
     * @param  int                    $retries
     * @param  RequestInterface       $request
     * @param  ResponseInterface|null $response
     * @param  RequestException|null  $exception
     * @return bool
     */
    public function retryDecider(int $retries, RequestInterface $request, ResponseInterface $response = null, ClientExceptionInterface $exception = null): bool
    {
        // Limit the number of retries to 5
        if ($retries >= 5) {
            return false;
        }

        // Retry connection exceptions
        if ($exception instanceof ConnectException) {
            return true;
        }

        // Retry 5XX
        if ($exception instanceof ServerException) {
            return true;
        }

        // Otherwise, retry when we're having a 429 exception
        if ((! is_null($response)) && ($response->getStatusCode() === 429)) {
            return true;
        }

        return false;
    }

    /**
     * Basic retry delay
     *
     * @internal
     * @param  int $retries
     * @return int
     */
    public function retryDelay(int $retries): int
    {
        return 1000 * $retries;
    }

    /**
     * Validate all the connection parameters
     *
     * @param array $connectionOptions
     */
    private function validateConnectionOptions(array $connectionOptions)
    {
        if (!isset($connectionOptions['shop'], $connectionOptions['version'], $connectionOptions['api_key'], $connectionOptions['private_app'])) {
            throw new RuntimeException('"shop", "version", "private_app" and/or "api_key" must be provided when instantiating the Shopify client');
        }

        if ($connectionOptions['private_app'] && !isset($connectionOptions['password'])) {
            throw new RuntimeException('You must specify the "password" option when instantiating the Shopify client for a private app');
        }

        if (!$connectionOptions['private_app'] && !isset($connectionOptions['access_token'])) {
            throw new RuntimeException('You must specify the "access_token" option when instantiating the Shopify client for a public app');
        }
    }

    /**
     * @return GuzzleClient
     */
    private function createDefaultClient(array $guzzleMiddleware = []): GuzzleClient
    {
        $baseUri = 'https://' . str_replace('.myshopify.com', '', $this->connectionOptions['shop']) . '.myshopify.com';

        $handlerStack = HandlerStack::create(new CurlHandler());
        $handlerStack->push(Middleware::retry([$this, 'retryDecider'], [$this, 'retryDelay']));

        foreach ($guzzleMiddleware as $curMiddleware) {
            $handlerStack->push($curMiddleware);
        }

        $httpClient = new Client([
            'base_uri'        => $baseUri,
            'handler'         => $handlerStack,
            'allow_redirects' => [
                'max'             => 5,
                'strict'          => true,
                'referer'         => true,
                'protocols'       => ['https'],
                'track_redirects' => true
            ]
        ]);
        $description = new Description(require __DIR__ . '/ServiceDescription/Shopify-v1.php');

        return new GuzzleClient($httpClient, $description, [$this, 'wrapRequestData']);
    }

    /**
     * @param  string $commandName
     * @param  array  $args
     * @return Generator
     */
    private function iterateResources(string $commandName, array $args): Generator
    {
        // Since the 2020-01 version, Shopify now uses a cursor based approach
        if ($this->connectionOptions['version'] >= '2020-01') {
            // We force a limit of 250 to limit the number of needed requests
            $args['limit'] = 250;

            // Do the first request to initate the process
            $command = $this->getCommand($commandName, $args);
            $results = $this->guzzleClient->execute($command);

            // For the data itself, we delegate to unwrap response data
            $resources = $this->unwrapResponseData($command, $results->toArray());

            foreach ($resources as $resource) {
                yield $resource;
            }

            // To continue the iteration, we have to use the pagination link (if present)
            $linkHeader = $results['pagination'] ?? '';

            while (!empty($linkHeader)) {
                preg_match("/<(.*)>; rel=\"next\"/", $linkHeader, $matches);

                if (!isset($matches[1])) {
                    break;
                }

                // We initiate the next request using the bare client, as we can't re-use commands at this stage
                $httpClient = $this->guzzleClient->getHttpClient();
                $response   = $httpClient->request('GET', $matches[1], $this->getRequestArguments());

                // Decode the response and yield the result
                $resources = $this->unwrapResponseData($command, json_decode($response->getBody()->getContents(), true));

                foreach ($resources as $resource) {
                    yield $resource;
                }

                // Extract the header line (if any) to continue the process
                $linkHeader = $response->getHeaderLine('Link');
            }
        } else {
            // When using the iterator, we force the maximum number of items per page. Also, if no "since_id" is set, we force it to 0 because by
            // default Shopify sort resources by title
            $args['limit'] = 250;
            $args['since_id'] = $args['since_id'] ?? 0;

            // Because the iteration depends on the presence of the "id" field, we must make sure that if the "fields" filter is set, it contains
            // at the minimum the "id" one. We make a simple detection here
            if (isset($args['fields'])) {
                $fields         = explode(',', str_replace(' ', '', $args['fields']));
                $args['fields'] = implode(',', array_unique(array_merge(['id'], $fields)));
            }

            do {
                $command = $this->getCommand($commandName, $args);
                $results = $this->execute($command);

                foreach ($results as $result) {
                    yield $result;
                }

                // Advance the since_id
                $args['since_id'] = end($results)['id'];
            } while (count($results) >= 250);
        }
    }

    /**
     * In Shopify, all API responses wrap the data by the resource name. For instance, using the "/shop" endpoint will wrap
     * the data by the "shop" key. This is a bit inconvenient to use in userland. As a consequence, we always "unwrap" the result.
     *
     * @param  CommandInterface $command
     * @param  array            $bodyPayload
     * @return mixed
     */
    private function unwrapResponseData(CommandInterface $command, array $bodyPayload)
    {
        $operation = $this->guzzleClient->getDescription()->getOperation($command->getName());
        $rootKey   = $operation->getData('root_key_response') ?? $operation->getData('root_key');
        $result    = (null === $rootKey) ? $bodyPayload : $bodyPayload[$rootKey];

        if (substr($command->getName(), 0, 5) === 'Count') {
            return $result['count'];
        }

        return $result;
    }

    private function getRequestArguments($headers=[]): array
    {
        $request_arguments = $this->getRequestAuthorizationArguments();

        if (!empty($headers)) {
            $request_arguments['headers'] = (array_key_exists('headers', $request_arguments)) ? array_merge($request_arguments['headers'], $headers) : $headers;
        }

        return $request_arguments;
    }

    private function getRequestAuthorizationArguments(): array
    {
        // Add authentication parameters to each command based on the Shopify app type

        if ($this->connectionOptions['private_app']) {
            return [
                'auth' => [$this->connectionOptions['api_key'], $this->connectionOptions['password']]
            ];
        } else {
            return [
                'headers' => [
                    'X-Shopify-Access-Token' => $this->connectionOptions['access_token']
                ]
            ];
        }
    }
}