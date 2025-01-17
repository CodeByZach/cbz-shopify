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

return [
    'name'        => 'Shopify',
    'description' => 'Shopify is an awesome e-commerce platform',
    'operations'  => [
        /**
         * ---------------------------------------------------------------------------------------------
         * Abandoned Checkouts
         * https://shopify.dev/api/admin/rest/reference/orders/abandoned-checkouts
         * ---------------------------------------------------------------------------------------------
         */
        'CountAbandonedCheckouts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of access scopes',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Count checkouts created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Count checkouts created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Count checkouts last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Count checkouts last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Count checkouts with a given status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'closed' ],
                    'required'    => false
                ]
            ]
        ],

        'GetAbandonedCheckouts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve all abandoned checkouts',
            'data'          => [ 'root_key' => 'checkouts' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Count checkouts created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Count checkouts created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Count checkouts last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Count checkouts last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Count checkouts with a given status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'closed' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * AccessScope
         * https://shopify.dev/api/admin/rest/reference/access/accessscope
         * ---------------------------------------------------------------------------------------------
         */
        'GetAccessScopes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/oauth/access_scopes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of access scopes',
            'data'          => [ 'root_key' => 'access_scopes' ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ApplicationCharge
         * https://shopify.dev/api/admin/rest/reference/billing/applicationcharge
         * ---------------------------------------------------------------------------------------------
         */
        'CreateApplicationCharge' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/application_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new application charge',
            'data'          => [ 'root_key' => 'application_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Application charge name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'return_url' => [
                    'description' => 'URL where Shopify must return once the charge has been accepted',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'test' => [
                    'description' => 'Use to create a test charge',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'GetApplicationCharges' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/application_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of application charges',
            'data'          => [ 'root_key' => 'application_charges' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetApplicationCharge' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/application_charges/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific application charge',
            'data'          => [ 'root_key' => 'application_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ApplicationCredit
         * https://shopify.dev/api/admin/rest/reference/billing/applicationcredit
         * ---------------------------------------------------------------------------------------------
         */
        'CreateApplicationCredit' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/application_credits.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new application credit',
            'data'          => [ 'root_key' => 'application_credit' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Application credit description',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'amount' => [
                    'description' => 'Amount to credit',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'test' => [
                    'description' => 'Use to create a test credit',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'GetApplicationCredit' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/application_credits/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific application credit',
            'data'          => [ 'root_key' => 'application_credit' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific application credit ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetApplicationCredits' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/application_credits.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of application credits',
            'data'          => [ 'root_key' => 'application_credits' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Article
         * https://shopify.dev/api/admin/rest/reference/online-store/article
         * ---------------------------------------------------------------------------------------------
         */
        'GetArticles' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all articles from a blog',
            'data'          => [ 'root_key' => 'articles' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show articles created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show articles created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show articles last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show articles last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show articles published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show articles published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Retrieve an article with a specific handle',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tag' => [
                    'description' => 'Filter articles with a specific tag',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'author' => [
                    'description' => 'Filter articles by article author',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountArticles' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of articles (for a single blog)',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to count articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'created_at_min' => [
                    'description' => 'Count articles created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Count articles created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Count articles last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Count articles last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Count articles published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Count articles published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Count articles with a given published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ]
            ]
        ],

        'GetArticle' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific article from a given blog',
            'data'          => [ 'root_key' => 'article' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateArticle' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new article',
            'data'          => [ 'root_key' => 'article' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Article title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'author' => [
                    'description' => 'The name of the author of the article',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The text of the body of the article, complete with HTML markup',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the article that\'s automatically generated from the article\'s title. The handle is used in the article\'s URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'image' => [
                    'description' => 'An image associated with the article. It can have the following properties: attachment, src, alt, width, height',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the article is visible',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the article was published',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'summary_html' => [
                    'description' => 'A summary of the article, complete with HTML markup. The summary isused by the online store theme to display the article on other pages, such as the home page or the main blog page',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A comma-separated list of tags. Tags are additional short descriptors formatted as a string of comma-separated values',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The name of the template an article is using if it\'s using an alternate template. If an article is using the default article.liquid template, then the value returned is null',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateArticle' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing article',
            'data'          => [ 'root_key' => 'article' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'author' => [
                    'description' => 'The name of the author of the article',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The text of the body of the article, complete with HTML markup',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the article that\'s automatically generated from the article\'s title. The handle is used in the article\'s URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'image' => [
                    'description' => 'An image associated with the article. It can have the following properties: attachment, src, alt, width, height',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the article is visible',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the article was published',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'summary_html' => [
                    'description' => 'A summary of the article, complete with HTML markup. The summary isused by the online store theme to display the article on other pages, such as the home page or the main blog page',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A comma-separated list of tags. Tags are additional short descriptors formatted as a string of comma-separated values',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The name of the template an article is using if it\'s using an alternate template. If an article is using the default article.liquid template, then the value returned is null',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetArticleAuthors' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/articles/authors.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve list of all article authors',
            'data'          => [ 'root_key' => 'authors' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetArticleTags' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/articles/tags.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list all of article authors',
            'data'          => [ 'root_key' => 'tags' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of tags to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'popular' => [
                    'description' => 'A flag for ordering retrieved tags. If present in the request, then the results will be ordered by popularity, starting with the most popular tag',
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'DeleteArticle' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing article',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Asset
         * https://shopify.dev/api/admin/rest/reference/online-store/asset
         * ---------------------------------------------------------------------------------------------
         */
        'GetAssets' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of assets for a given theme',
            'data'          => [ 'root_key' => 'assets' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetAsset' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a single asset',
            'data'          => [ 'root_key' => 'asset' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Complete key of the asset file',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'asset[key]',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateAsset' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new asset in the given theme',
            'data'          => [ 'root_key' => 'asset' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The path to the asset within a theme. It consists of the file\'s directory and filename',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The text content of the asset, such as the HTML and Liquid markup of a template file',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'attachment' => [
                    'description' => 'A base64-encoded image',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'src' => [
                    'description' => 'The source URL of an image. Include in the body of the PUT request to upload the image to Shopify',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'source_key' => [
                    'description' => 'The path within the theme to an existing asset. Include in the body of the PUT request to create a duplicate asset',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdateAsset' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new asset in the given theme',
            'data'          => [ 'root_key' => 'asset' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The path to the asset within a theme. It consists of the file\'s directory and filename',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The text content of the asset, such as the HTML and Liquid markup of a template file',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'attachment' => [
                    'description' => 'A base64-encoded image',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteAsset' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing asset',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The path to the asset within a theme. It consists of the file\'s directory and filename',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'asset[key]',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * AssignedFulfillmentOrder
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/assignedfulfillmentorder
         * ---------------------------------------------------------------------------------------------
         */
        'GetAssignedFulfillmentOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/assigned_fulfillment_orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of fulfillment orders on a shop for a specific app.',
            'data'          => [ 'root_key' => 'fulfillment_orders' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'assignment_status' => [
                    'description' => 'Retrieves a list of fulfillment orders on a shop for a specific app.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'cancellation_requested', 'fulfillment_requested', 'fulfillment_accepted' ],
                    'required'    => false
                ],
                'location_ids' => [
                    'description' => 'The IDs of the assigned locations of the fulfillment orders that should be returned.',
                    'location'    => 'query',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Balance
         * https://shopify.dev/api/admin/rest/reference/shopify_payments/balance
         * ---------------------------------------------------------------------------------------------
         */
        'GetBalance' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/balance.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves the account\'s current balance.',
            'data'          => [ 'root_key' => 'balance' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Balance Transaction
         * https://shopify.dev/api/admin/rest/reference/shopify_payments/transaction
         * ---------------------------------------------------------------------------------------------
         */
        'GetBalanceTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Return a list of all balance transactions.',
            'data'          => [ 'root_key' => 'transactions' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Filter response to transactions exclusively after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'last_id' => [
                    'description' => 'Filter response to transactions exclusively before the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'test' => [
                    'description' => 'Filter response to transactions placed in test mode.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'payout_id' => [
                    'description' => 'Filter response to transactions paid out in the specified payout.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'payout_status' => [
                    'description' => 'Filter response to transactions with the specified payout status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'paid', 'scheduled', 'pending' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Blog
         * https://shopify.dev/api/admin/rest/reference/online-store/blog
         * ---------------------------------------------------------------------------------------------
         */
        'GetBlogs' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of blogs',
            'data'          => [ 'root_key' => 'blogs' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Filter by blog handle',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tag' => [
                    'description' => 'Filter articles with a specific tag',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'author' => [
                    'description' => 'Filter articles by article author',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountBlogs' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of blogs',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetBlog' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Get a single blog by its ID',
            'data'          => [ 'root_key' => 'blog' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog to get',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateBlog' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/blogs.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new blog',
            'data'          => [ 'root_key' => 'blog' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'The title of the blog',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'commentable' => [
                    'description' => 'Indicates whether readers can post comments to the blog and if comments are moderated or not',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'no', 'moderate', 'yes' ],
                    'required'    => false
                ],
                'feedburner' => [
                    'description' => 'Feedburner is a web feed management provider and can be enabled to provide custom RSS feeds for Shopify bloggers. This property will default to blank or "null" unless feedburner is enabled through the shop admin',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'feedburner_location' => [
                    'description' => 'URL to the feedburner location for blogs that have enabled feedburner through their store admin. This property will default to blank or "null" unless feedburner is enabled through the shop admin',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for a blog automatically generated from its title. This handle is used by the Liquid templating language to refer to the blog',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags are additional short descriptors formatted as a string of comma-separated values. For example, if an article has three tags: tag1, tag2, tag3. Tags are limited to 255 characters',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'States the name of the template a blog is using if it is using an alternate template. If a blog is using the default blog.liquid template, the value returned is "null"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateBlog' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/blogs/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing blog',
            'data'          => [ 'root_key' => 'blog' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog to update',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'The title of the blog',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'commentable' => [
                    'description' => 'Indicates whether readers can post comments to the blog and if comments are moderated or not',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'no', 'moderate', 'yes' ],
                    'required'    => false
                ],
                'feedburner' => [
                    'description' => 'Feedburner is a web feed management provider and can be enabled to provide custom RSS feeds for Shopify bloggers. This property will default to blank or "null" unless feedburner is enabled through the shop admin',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'feedburner_location' => [
                    'description' => 'URL to the feedburner location for blogs that have enabled feedburner through their store admin. This property will default to blank or "null" unless feedburner is enabled through the shop admin',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for a blog automatically generated from its title. This handle is used by the Liquid templating language to refer to the blog',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags are additional short descriptors formatted as a string of comma-separated values. For example, if an article has three tags: tag1, tag2, tag3. Tags are limited to 255 characters',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'States the name of the template a blog is using if it is using an alternate template. If a blog is using the default blog.liquid template, the value returned is "null"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteBlog' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/blogs/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing blog',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog id',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * CancellationRequest
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/cancellationrequest
         * ---------------------------------------------------------------------------------------------
         */
        'SendCancellationRequest' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/cancellation_request.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Sends a cancellation request to the fulfillment service of a fulfillment order.',
            'data'          => [
                'root_key_request'  => 'cancellation_request',
                'root_key_response' => 'fulfillment_order'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'int',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional reason for the cancellation request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'AcceptCancellationRequest' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/cancellation_request/accept.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Accepts a cancellation request sent to a fulfillment service for a fulfillment order.',
            'data'          => [
                'root_key_request'  => 'cancellation_request',
                'root_key_response' => 'fulfillment_order'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'int',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional reason for the cancellation request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'RejectCancellationRequest' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/cancellation_request/reject.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Rejects a cancellation request sent to a fulfillment service for a fulfillment order.',
            'data'          => [
                'root_key_request'  => 'cancellation_request',
                'root_key_response' => 'fulfillment_order'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'int',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional reason for the cancellation request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * CarrierService
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/carrierservice
         * ---------------------------------------------------------------------------------------------
         */
        'CreateCarrierService' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/carrier_services.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a carrier service',
            'data'          => [ 'root_key' => 'carrier_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Carrier service name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'callback_url' => [
                    'description' => 'Carrier service callback url',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'active' => [
                    'description' => 'Whether this carrier service is active.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'carrier_service_type' => [
                    'description' => 'Distinguishes between API or legacy carrier services.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'api', 'legacy' ],
                    'required'    => false
                ],
                'format' => [
                    'description' => 'The format of the data returned by the URL endpoint.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'json', 'xml' ],
                    'required'    => false
                ],
                'service_discovery' => [
                    'description' => 'Whether merchants are able to send dummy data to your service through the Shopify admin to see shipping rate examples.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'admin_graphql_api_id' => [
                    'description' => 'The GraphQL unique identifier for the carrier service.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdateCarrierService' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update a carrier service',
            'data'          => [ 'root_key' => 'carrier_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Carrier service name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'callback_url' => [
                    'description' => 'Carrier service callback url',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'active' => [
                    'description' => 'Whether this carrier service is active.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'carrier_service_type' => [
                    'description' => 'Distinguishes between API or legacy carrier services.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'api', 'legacy' ],
                    'required'    => false
                ],
                'format' => [
                    'description' => 'The format of the data returned by the URL endpoint.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'json', 'xml' ],
                    'required'    => false
                ],
                'service_discovery' => [
                    'description' => 'Whether merchants are able to send dummy data to your service through the Shopify admin to see shipping rate examples.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'admin_graphql_api_id' => [
                    'description' => 'The GraphQL unique identifier for the carrier service.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetCarrierServices' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/carrier_services.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of carrier services',
            'data'          => [ 'root_key' => 'carrier_services' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCarrierService' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific carrier service',
            'data'          => [ 'root_key' => 'carrier_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteCarrierService' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a carrier service',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Checkout
         * https://shopify.dev/api/admin/rest/reference/sales-channels/checkout
         * ---------------------------------------------------------------------------------------------
         */
        'CreateCheckout' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/checkouts.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a checkout.',
            'data'          => [ 'root_key' => 'checkout' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'A list of line item objects, each containing information about an item in the checkout.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'billing_address' => [
                    'description' => 'The mailing address associated with the payment method.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'applied_discount' => [
                    'description' => 'A cart-level discount applied to the checkout. Apply a discount by specifying values for amount, title, description, value, and value_type.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'buyer_accepts_marketing' => [
                    'description' => 'Whether the customer has consented to receive marketing material via email.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three-letter code (ISO 4217 format) of the shop\'s default currency at the time of checkout.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'customer_id' => [
                    'description' => 'The ID of the customer associated with this checkout.',
                    'location'    => 'json',
                    'type'        => 'int',
                    'required'    => false
                ],
                'discount_code' => [
                    'description' => 'The discount code that is applied to the checkout. This populates applied_discount with the appropriate metadata for that discount code.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'gift_cards' => [
                    'description' => 'A list of gift card objects, each containing information about a gift card applied to this checkout.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number for receiving SMS notifications.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'requires_shipping' => [
                    'description' => 'Whether the checkout requires shipping. If true, then shipping_line must be set before creating a payment.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the checkout will be shipped.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_line' => [
                    'description' => 'The selected shipping rate. A new shipping rate can be selected by updating the value for handle. A shipping line is required when requires_shipping is true.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'source_name' => [
                    'description' => 'The source of the checkout. Apart from the reserved values of web, pos, iphone, and android, you can set this value to whatever you like.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tax_lines' => [
                    'description' => 'An array of tax_line objects, each of which represents a tax rate applicable to the checkout.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'taxes_included' => [
                    'description' => 'Whether taxes are included in the subtotal price.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'CompleteCheckout' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/checkouts/{token}/complete.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Complete a checkout.',
            'data'          => [ 'root_key' => 'checkout' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCheckout' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/{token}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a checkout.',
            'data'          => [ 'root_key' => 'checkout' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'UpdateCheckout' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/checkouts/{token}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Modifies an existing checkout.',
            'data'          => [ 'root_key' => 'checkout' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'A list of line item objects, each containing information about an item in the checkout.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'billing_address' => [
                    'description' => 'The mailing address associated with the payment method.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'applied_discount' => [
                    'description' => 'A cart-level discount applied to the checkout. Apply a discount by specifying values for amount, title, description, value, and value_type.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'buyer_accepts_marketing' => [
                    'description' => 'Whether the customer has consented to receive marketing material via email.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'customer_id' => [
                    'description' => 'The ID of the customer associated with this checkout.',
                    'location'    => 'json',
                    'type'        => 'int',
                    'required'    => false
                ],
                'discount_code' => [
                    'description' => 'The discount code that is applied to the checkout. This populates applied_discount with the appropriate metadata for that discount code.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'gift_cards' => [
                    'description' => 'A list of gift card objects, each containing information about a gift card applied to this checkout.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number for receiving SMS notifications.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the checkout will be shipped.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_line' => [
                    'description' => 'The selected shipping rate. A new shipping rate can be selected by updating the value for handle. A shipping line is required when requires_shipping is true.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'source_name' => [
                    'description' => 'The source of the checkout. Apart from the reserved values of web, pos, iphone, and android, you can set this value to whatever you like.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'GetCheckoutShippingRates' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/{token}/shipping_rates.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of available shipping rates for the specified checkout. Implementers need to poll this endpoint until rates become available. Each shipping rate contains the checkout\'s new subtotal price, total tax, and total price in the event that this shipping rate is selected. This can be used to update the UI without performing further API requests.',
            'data'          => [ 'root_key' => 'shipping_rates' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Collect
         * https://shopify.dev/api/admin/rest/reference/products/collect
         * ---------------------------------------------------------------------------------------------
         */
        'CreateCollect' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/collects.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Adds a product to a custom collection',
            'data'          => [ 'root_key' => 'collect' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'position' => [
                    'description' => 'The position of this product in a manually sorted custom collection. The first position is 1. This value is applied only when the custom collection is sorted manually.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'sort_value' => [
                    'description' => 'This is the same value as position but padded with leading zeroes to make it alphanumeric-sortable. This value is applied only when the custom collection is sorted manually.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCollect' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/collects/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a collect',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetCollects' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collects.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of collects',
            'data'          => [ 'root_key' => 'collects' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountCollects' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collects/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of collects',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCollect' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collects/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific collect',
            'data'          => [ 'root_key' => 'collect' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Collection
         * https://shopify.dev/api/admin/rest/reference/products/collection
         * ---------------------------------------------------------------------------------------------
         */
        'GetCollection' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a collection',
            'data'          => [ 'root_key' => 'collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCollectionProducts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{id}/products.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of collection products',
            'data'          => [ 'root_key' => 'products' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * CollectionListing
         * https://shopify.dev/api/admin/rest/reference/sales-channels/collectionlisting
         * ---------------------------------------------------------------------------------------------
         */
        'GetCollectionListings' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collection_listings.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve collection listings that are published to your app.',
            'data'          => [ 'root_key' => 'collection_listings' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 1000,
                    'required'    => false
                ]
            ]
        ],

        'GetCollectionListingProductIds' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collection_listings/{id}/product_ids.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve product_ids that are published to a collection_id.',
            'data'          => [ 'root_key' => 'product_ids' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 1000,
                    'required'    => false
                ]
            ]
        ],

        'GetCollectionListing' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collection_listings/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific collection listing that is published to your app.',
            'data'          => [ 'root_key' => 'collection_listing' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateCollectionListing' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/collection_listings/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a collection listing to publish a collection to your app.',
            'data'          => [ 'root_key' => 'collection_listing' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetCollectionListing' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/collection_listings/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a collection listing to unpublish a collection from your app.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection Listing ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Comment
         * https://shopify.dev/api/admin/rest/reference/online-store/comment
         * ---------------------------------------------------------------------------------------------
         */
        'GetComments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/comments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of comments.',
            'data'          => [ 'root_key' => 'comments' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'A unique numeric identifier for the article that the comment belongs to.',
                    'location'    => 'query',
                    'type'        => 'int',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'A unique numeric identifier for the blog containing the article that the comment belongs to.',
                    'location'    => 'query',
                    'type'        => 'int',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show comments created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show comments created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show comments last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show comments last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show comments published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show comments published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Filter results by their published status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter results by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'pending', 'published', 'unapproved' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountComments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/comments/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of comments.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'A unique numeric identifier for the article that the comment belongs to.',
                    'location'    => 'query',
                    'type'        => 'int',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'A unique numeric identifier for the blog containing the article that the comment belongs to.',
                    'location'    => 'query',
                    'type'        => 'int',
                    'required'    => true
                ],
                'created_at_max' => [
                    'description' => 'Show comments created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show comments last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show comments last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show comments published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show comments published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Filter results by their published status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter results by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'pending', 'published', 'unapproved' ],
                    'required'    => false
                ]
            ]
        ],

        'GetComment' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/comments/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single comment by its ID.',
            'data'          => [ 'root_key' => 'comment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a comment for an article.',
            'data'          => [ 'root_key' => 'comment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'A unique numeric identifier for the article that the comment belongs to.',
                    'location'    => 'json',
                    'type'        => 'int',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'A unique numeric identifier for the blog containing the article that the comment belongs to.',
                    'location'    => 'json',
                    'type'        => 'int',
                    'required'    => true
                ],
                'author' => [
                    'description' => 'The name of the author of the comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'body' => [
                    'description' => 'The basic Textile markup of a comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'The email address of the author of the comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'body_html' => [
                    'description' => 'The text of the comment, complete with HTML markup.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'ip' => [
                    'description' => 'The IP address from which the comment was posted.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'The status of the comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'pending', 'unapproved', 'published', 'spam', 'removed' ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateComment' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/comments/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a comment of an article.',
            'data'          => [ 'root_key' => 'comment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'author' => [
                    'description' => 'The name of the author of the comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body' => [
                    'description' => 'The basic Textile markup of a comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The email address of the author of the comment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The text of the comment, complete with HTML markup.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'SpamComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments/{id}/spam.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Marks a comment as spam.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UnspamComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments/{id}/not_spam.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Marks a comment as not spam.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'ApproveComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments/{id}/approve.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Approves a comment.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'RemoveComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments/{id}/remove.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Removes a comment.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'RestoreComment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/comments/{id}/restore.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Restores a previously removed comment.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Comment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Country
         * https://shopify.dev/api/admin/rest/reference/store-properties/country
         * ---------------------------------------------------------------------------------------------
         */
        'GetCountries' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of countries.',
            'data'          => [ 'root_key' => 'countries' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountCountries' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of countries.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCountry' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a specific county.',
            'data'          => [ 'root_key' => 'country' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Country ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCountry' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/countries.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a country.',
            'data'          => [ 'root_key' => 'country' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'The two-letter country code (ISO 3166-1 alpha-2 format).',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The full name of the country in English.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'provinces' => [
                    'description' => 'The sub-regions of a country, such as its provinces or states.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateCountry' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/countries/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates an existing country.',
            'data'          => [ 'root_key' => 'country' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Country ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'The two-letter country code (ISO 3166-1 alpha-2 format).',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The full name of the country in English.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'provinces' => [
                    'description' => 'The sub-regions of a country, such as its provinces or states.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCountry' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/countries/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a country.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Country ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Currency
         * https://shopify.dev/api/admin/rest/reference/store-properties/currency
         * ---------------------------------------------------------------------------------------------
         */
        'GetCurrencies' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/currencies.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of currencies enabled on a shop.',
            'data'          => [ 'root_key' => 'currencies' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * CustomCollection
         * https://shopify.dev/api/admin/rest/reference/products/customcollection
         * ---------------------------------------------------------------------------------------------
         */
        'GetCustomCollections' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/custom_collections.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of custom collections',
            'data'          => [ 'root_key' => 'custom_collections' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'ids' => [
                    'description' => 'Show only collections specified by a comma-separated list of IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'title' => [
                    'description' => 'Show custom collections with a given title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'product_id' => [
                    'description' => 'Show custom collections that include a given product.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Filter by custom collection handle.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show custom collections last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show custom collections last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show custom collections published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show custom collections published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountCustomCollections' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/custom_collections/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of custom collections',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Show custom collections that include a given product.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show custom collections last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show custom collections last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show custom collections published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show custom collections published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCustomCollection' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific custom collection',
            'data'          => [ 'root_key' => 'custom_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCustomCollection' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/custom_collections.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a custom collection',
            'data'          => [ 'root_key' => 'custom_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Custom collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'body_html' => [
                    'description' => 'The description of the custom collection, complete with HTML markup. Many templates display this on their custom collection pages.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the custom collection automatically generated from its title. This is used in shop themes by the Liquid templating language to refer to the custom collection. (limit: 255 characters)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'image' => [
                    'description' => 'An image associated with the article. It can have the following properties: attachment, src, alt, width, height',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the custom collection is published to the Online Store channel.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'sort_order' => [
                    'description' => 'The order in which products in the custom collection appear.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'alpha-asc', 'alpha-desc', 'best-selling', 'created', 'created-desc', 'manual', 'price-asc', 'price-desc' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the liquid template being used. For example, if the value is "custom", then the collection is using the "collection.custom.liquid" template. If the value is "null", then the collection is using the default "collection.liquid".',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateCustomCollection' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update a custom collection',
            'data'          => [ 'root_key' => 'custom_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Custom collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The description of the custom collection, complete with HTML markup. Many templates display this on their custom collection pages.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the custom collection automatically generated from its title. This is used in shop themes by the Liquid templating language to refer to the custom collection. (limit: 255 characters)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'image' => [
                    'description' => 'An image associated with the article. It can have the following properties: attachment, src, alt, width, height',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the custom collection is published to the Online Store channel.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'sort_order' => [
                    'description' => 'The order in which products in the custom collection appear.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'alpha-asc', 'alpha-desc', 'best-selling', 'created', 'created-desc', 'manual', 'price-asc', 'price-desc' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the liquid template being used. For example, if the value is "custom", then the collection is using the "collection.custom.liquid" template. If the value is "null", then the collection is using the default "collection.liquid".',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCustomCollection' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a custom collection',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Customer
         * https://shopify.dev/api/admin/rest/reference/customers/customer
         * ---------------------------------------------------------------------------------------------
         */
        'GetCustomers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of customers',
            'data'          => [ 'root_key' => 'customers' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Show only collections specified by a comma-separated list of IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show customers created after a specified date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show customers created before a specified date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show customers last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show customers last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'SearchCustomers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/search.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Searches for customers that match a supplied query.',
            'data'          => [ 'root_key' => 'customers' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'query' => [
                    'description' => 'Text to search for in the shop\'s customer data. Note: Supported queries: accepts_marketing, activation_date, address1, address2, city, company, country, customer_date, customer_first_name, customer_id, customer_last_name, customer_tag,  email, email_marketing_state, first_name, first_order_date, id, last_abandoned_order_date, last_name, multipass_identifier, orders_count, order_date, phone, province, shop_id, state, tag, total_spent, updated_at, verified_email, product_subscriber_status. All other queries returns all customers.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order' => [
                    'description' => 'Field and direction to order results by',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCustomer' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a single customer',
            'data'          => [ 'root_key' => 'customer' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCustomer' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new customer',
            'data'          => [ 'root_key' => 'customer' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'The email address of the customer',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'first_name' => [
                    'description' => 'The customer\'s first name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'last_name' => [
                    'description' => 'The customer\'s last name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'accepts_marketing' => [
                    'description' => 'Whether the customer has consented to receive marketing material via email.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'accepts_marketing_updated_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the customer consented or objected to receiving marketing material by email. Set this value whenever the customer consents or objects to marketing materials.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'addresses' => [
                    'description' => 'A list of the ten most recently updated addresses for the customer.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'marketing_opt_in_level' => [
                    'description' => 'The marketing subscription opt-in level (as described by the M3AAWG best practices guideline) that the customer gave when they consented to receive marketing material by email. If the customer does not accept email marketing, then this property will be set to null.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'single_opt_in', 'confirmed_opt_in', 'unknown' ],
                    'required'    => false
                ],
                'multipass_identifier' => [
                    'description' => 'A unique identifier for the customer that\'s used with Multipass login.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'A note about the customer.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The unique phone number (E.164 format) for this customer.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags that the shop owner has attached to the customer, formatted as a string of comma-separated values. A customer can have up to 250 tags. Each tag can have up to 255 characters.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'tax_exempt' => [
                    'description' => 'Whether the customer is exempt from paying taxes on their order. If true, then taxes won\'t be applied to an order at checkout. If false, then taxes will be applied at checkout.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_exemptions' => [
                    'description' => 'Whether the customer is exempt from paying specific taxes on their order. Canadian taxes only.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'send_email_invite' => [
                    'description' => 'Send an invitation email.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateCustomer' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Modify an existing customer',
            'data'          => [ 'root_key' => 'customer' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'The email address of the customer',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'first_name' => [
                    'description' => 'The customer\'s first name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'last_name' => [
                    'description' => 'The customer\'s last name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'accepts_marketing' => [
                    'description' => 'Whether the customer has consented to receive marketing material via email.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'accepts_marketing_updated_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the customer consented or objected to receiving marketing material by email. Set this value whenever the customer consents or objects to marketing materials.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'addresses' => [
                    'description' => 'A list of the ten most recently updated addresses for the customer.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'marketing_opt_in_level' => [
                    'description' => 'The marketing subscription opt-in level (as described by the M3AAWG best practices guideline) that the customer gave when they consented to receive marketing material by email. If the customer does not accept email marketing, then this property will be set to null.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'single_opt_in', 'confirmed_opt_in', 'unknown' ],
                    'required'    => false
                ],
                'multipass_identifier' => [
                    'description' => 'A unique identifier for the customer that\'s used with Multipass login.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'A note about the customer.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The unique phone number (E.164 format) for this customer.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags that the shop owner has attached to the customer, formatted as a string of comma-separated values. A customer can have up to 250 tags. Each tag can have up to 255 characters.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'tax_exempt' => [
                    'description' => 'Whether the customer is exempt from paying taxes on their order. If true, then taxes won\'t be applied to an order at checkout. If false, then taxes will be applied at checkout.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_exemptions' => [
                    'description' => 'Whether the customer is exempt from paying specific taxes on their order. Canadian taxes only.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'SendCustomerActivationUrl' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers/{id}/account_activation_url.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates an account activation URL for a customer',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'SendCustomerInvite' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers/{id}/send_invite.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Sends an account invite to a customer',
            'data'          => [ 'root_key' => 'customer_invite' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'to' => [
                    'description' => 'Email to send to.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'from' => [
                    'description' => 'Email to send from.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'bcc' => [
                    'description' => 'Email to BCC.',
                    'location'    => 'query',
                    'type'        => 'array',
                    'required'    => false
                ],
                'subject' => [
                    'description' => 'Subject of the email.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'custom_message' => [
                    'description' => 'Custom contents of the email.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCustomer' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/customers/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a customer. A customer can\'t be deleted if they have existing orders.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountCustomers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of all customers.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCustomerOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{id}/orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves all orders belonging to a customer.',
            'data'          => [ 'root_key' => 'orders' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Retrieve only orders specified by a comma-separated list of order IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show on a page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Show orders after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show orders last created at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show orders last created at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show orders last updated at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show orders last updated at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at_min' => [
                    'description' => 'Show orders imported at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at_max' => [
                    'description' => 'Show orders imported at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'attribution_app_id' => [
                    'description' => 'Show orders attributed to a certain app, specified by the app ID. Set as current to show orders for the app currently consuming the API.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter orders by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ],
                    'required'    => false
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ],
                    'required'    => false
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Retrieve only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Customer Address
         * https://shopify.dev/api/admin/rest/reference/customers/customer-address
         * ---------------------------------------------------------------------------------------------
         */
        'GetCustomerAddresses' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list addresses for a customer',
            'data'          => [ 'root_key' => 'addresses' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show on a page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ]
            ]
        ],

        'GetCustomerAddress' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves details of a single customer addresses',
            'data'          => [ 'root_key' => 'customer_address' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateCustomerAddress' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new address for a customer',
            'data'          => [
                'root_key_request'  => 'address',
                'root_key_response' => 'customer_address'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address1' => [
                    'description' => 'The customer\'s mailing address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'address2' => [
                    'description' => 'An additional field for the customer\'s mailing address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'city' => [
                    'description' => 'The customer\'s city.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country' => [
                    'description' => 'The customer\'s country.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country_name' => [
                    'description' => 'The customer\'s normalized country name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'company' => [
                    'description' => 'The customer\'s company.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'first_name' => [
                    'description' => 'The customer\'s first name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'last_name' => [
                    'description' => 'The customer\'s last name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'name' => [
                    'description' => 'The customer\'s first and last names.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number at this address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'province' => [
                    'description' => 'The customer\'s region name. Typically a province, a state, or a prefecture.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'zip' => [
                    'description' => 'The customer\'s postal code, also known as zip, postcode, Eircode, etc.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdateCustomerAddress' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing address for a customer',
            'data'          => [
                'root_key_request'  => 'address',
                'root_key_response' => 'customer_address'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address1' => [
                    'description' => 'The customer\'s mailing address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'address2' => [
                    'description' => 'An additional field for the customer\'s mailing address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'city' => [
                    'description' => 'The customer\'s city.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country' => [
                    'description' => 'The customer\'s country.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country_name' => [
                    'description' => 'The customer\'s normalized country name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'company' => [
                    'description' => 'The customer\'s company.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'first_name' => [
                    'description' => 'The customer\'s first name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'last_name' => [
                    'description' => 'The customer\'s last name.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'name' => [
                    'description' => 'The customer\'s first and last names.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number at this address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'province' => [
                    'description' => 'The customer\'s region name. Typically a province, a state, or a prefecture.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'zip' => [
                    'description' => 'The customer\'s postal code, also known as zip, postcode, Eircode, etc.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCustomerAddress' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Removes an address from a customer\'s address list',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateCustomerAddresses' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses/set.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Performs bulk operations for multiple customer addresses',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Address IDs',
                    'location'    => 'query',
                    'type'        => 'array',
                    'sentAs'      => 'address_ids[]',
                    'required'    => true
                ],
                'operation' => [
                    'description' => 'Operation to perform',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'destroy' ],
                    'required'    => true
                ]
            ]
        ],

        'SetDefaultCustomerAddress' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/addresses/{id}/default.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing address for a customer',
            'data'          => [ 'root_key' => 'customer_address' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * CustomerSavedSearch
         * https://shopify.dev/api/admin/rest/reference/customers/customersavedsearch
         * ---------------------------------------------------------------------------------------------
         */
        'GetCustomerSavedSearches' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customer_saved_searches.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of customer saved searches',
            'data'          => [ 'root_key' => 'customer_saved_searches' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountCustomerSavedSearches' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customer_saved_searches/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of all customer saved searches.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'GetCustomerSavedSearch' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customer_saved_searches/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single customer saved search',
            'data'          => [ 'root_key' => 'customer_saved_search' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer Saved Search ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCustomerSavedSearchCustomers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customer_saved_searches/{id}/customers.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves all customers returned by a customer saved search',
            'data'          => [ 'root_key' => 'customers' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer Saved Search ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order' => [
                    'description' => 'Set the field and direction by which to order results',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCustomerSavedSearch' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customer_saved_searches.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a customer saved search',
            'data'          => [ 'root_key' => 'customer_saved_search' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The name given by the shop owner to the customer saved search',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'query' => [
                    'description' => 'The set of conditions that determines which customers are returned by the saved search',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'UpdateCustomerSavedSearch' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customer_saved_searches/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a customer saved search',
            'data'          => [ 'root_key' => 'customer_saved_search' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'A unique identifier for the customer saved search',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The name given by the shop owner to the customer saved search',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'query' => [
                    'description' => 'The set of conditions that determines which customers are returned by the saved search',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCustomerSavedSearch' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/customer_saved_searches/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a customer saved search',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'A unique identifier for the customer saved search',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Deprecated API Calls
         * https://shopify.dev/api/admin/rest/reference/deprecated_api_calls
         * ---------------------------------------------------------------------------------------------
         */
        'GetDeprecatedApiCalls' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/deprecated_api_calls.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of deprecated API calls made by your private apps in the past 30 days',
            'data'          => [ 'root_key' => 'deprecated_api_calls' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * DiscountCode
         * https://shopify.dev/api/admin/rest/reference/discounts/discountcode
         * ---------------------------------------------------------------------------------------------
         */
        'CreateDiscountCode' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new discount code for the given price rule',
            'data'          => [ 'root_key' => 'discount_code' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'Code',
                    'location'    => 'json',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => true
                ]
            ]
        ],

        'UpdateDiscountCode' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing discount code',
            'data'          => [ 'root_key' => 'discount_code' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'Discount code',
                    'location'    => 'json',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => true
                ]
            ]
        ],

        'GetDiscountCodes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of discount codes',
            'data'          => [ 'root_key' => 'discount_codes' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetDiscountCode' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific discount code',
            'data'          => [ 'root_key' => 'discount_code' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'LookupDiscountCode' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/discount_codes/lookup.json',
            'responseModel' => 'RedirectModel',
            'summary'       => 'Retrieves the location of a discount code',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'Code',
                    'location'    => 'query',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => true
                ]
            ]
        ],

        'CountDiscountCodes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/discount_codes/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of discount codes for a shop',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'times_used' => [
                    'description' => 'Show discount codes with times used.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'times_used_min' => [
                    'description' => 'Show discount codes used less than or equal to this value.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'times_used_max' => [
                    'description' => 'Show discount codes used greater than or equal to this value.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'DeleteDiscountCode' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a discount code',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateDiscountCodeBatch' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/batch.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a discount code creation job',
            'data'          => [ 'root_key' => 'discount_code_creation' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'discount_codes' => [
                    'description' => 'Discount codes',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        'GetDiscountCodeBatch' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/batch/{batch_id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a discount code creation job',
            'data'          => [ 'root_key' => 'discount_code_creation' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'batch_id' => [
                    'description' => 'Batch ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetDiscountCodeBatchDiscountCodes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules/{price_rule_id}/batch/{batch_id}/discount_codes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of discount codes for a discount code creation job.',
            'data'          => [ 'root_key' => 'discount_codes' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'batch_id' => [
                    'description' => 'Batch ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Dispute
         * https://shopify.dev/api/admin/rest/reference/shopify_payments/dispute
         * ---------------------------------------------------------------------------------------------
         */
        'GetDisputes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/disputes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve all disputes ordered by initiated_at date and time (ISO 8601 format), with the most recent being first.',
            'data'          => [ 'root_key' => 'disputes' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Return only disputes after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'last_id' => [
                    'description' => 'Return only disputes before the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter by draft order status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'needs_response', 'under_review', 'charge_refunded', 'accepted', 'won', 'lost' ],
                    'required'    => false
                ],
                'initiated_at' => [
                    'description' => 'Return only disputes with the specified initiated_at date (ISO 8601 format).',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],

        'GetDispute' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/disputes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single dispute by ID.',
            'data'          => [ 'root_key' => 'dispute' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Dispute ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * DraftOrder
         * https://shopify.dev/api/admin/rest/reference/orders/draftorder
         * ---------------------------------------------------------------------------------------------
         */
        'CreateDraftOrder' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/draft_orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new draft order',
            'data'          => [ 'root_key' => 'draft_order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'The draft order line items',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'customer' => [
                    'description' => 'Information about the customer.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the order will be shipped.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'billing_address' => [
                    'description' => 'The mailing address associated with the payment method.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'The text of an optional note that a shop owner can attach to the draft order.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note_attributes' => [
                    'description' => 'Extra information that is added to the order. Appears in the Additional details section of an order details page. Each array entry must contain a hash with "name" and "value" keys.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three letter code (ISO 4217 format) for the currency used for the payment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_line' => [
                    'description' => 'A shipping_line object, which details the shipping method used.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A comma-seperated list of additional short descriptors, commonly used for filtering and searching. Each individual tag is limited to 40 characters in length.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'tax_exempt' => [
                    'description' => 'Whether taxes are exempt for the draft order. If set to false, then Shopify refers to the taxable field for each line_item. If a customer is applied to the draft order, then Shopify uses the customer\'s tax_exempt field instead.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_exemptions' => [
                    'description' => 'Whether the customer is exempt from paying specific taxes on their order. Canadian taxes only.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tax_lines' => [
                    'description' => 'An array of tax line objects, each of which details a tax applicable to the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'applied_discount' => [
                    'description' => 'The discount applied to the line item or the draft order object. Each draft order object can have one applied_discount object and each draft order line item can have its own applied_discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'taxes_included' => [
                    'description' => 'Whether taxes are included in the order subtotal.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'customer_id' => [
                    'description' => 'Used to load the customer. When a customer is loaded, the customer\'s email address is also associated.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'use_customer_default_address' => [
                    'description' => 'An optional boolean that you can send as part of a draft order object to load customer shipping information.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateDraftOrder' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing draft order',
            'data'          => [ 'root_key' => 'draft_order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'The draft order line items',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'customer' => [
                    'description' => 'Information about the customer.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the order will be shipped.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'billing_address' => [
                    'description' => 'The mailing address associated with the payment method.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'The text of an optional note that a shop owner can attach to the draft order.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note_attributes' => [
                    'description' => 'Extra information that is added to the order. Appears in the Additional details section of an order details page. Each array entry must contain a hash with "name" and "value" keys.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three letter code (ISO 4217 format) for the currency used for the payment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_line' => [
                    'description' => 'A shipping_line object, which details the shipping method used.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A comma-seperated list of additional short descriptors, commonly used for filtering and searching. Each individual tag is limited to 40 characters in length.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'tax_exempt' => [
                    'description' => 'Whether taxes are exempt for the draft order. If set to false, then Shopify refers to the taxable field for each line_item. If a customer is applied to the draft order, then Shopify uses the customer\'s tax_exempt field instead.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_exemptions' => [
                    'description' => 'Whether the customer is exempt from paying specific taxes on their order. Canadian taxes only.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tax_lines' => [
                    'description' => 'An array of tax line objects, each of which details a tax applicable to the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'applied_discount' => [
                    'description' => 'The discount applied to the line item or the draft order object. Each draft order object can have one applied_discount object and each draft order line item can have its own applied_discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'taxes_included' => [
                    'description' => 'Whether taxes are included in the order subtotal.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'customer_id' => [
                    'description' => 'Used to load the customer. When a customer is loaded, the customer\'s email address is also associated.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'use_customer_default_address' => [
                    'description' => 'An optional boolean that you can send as part of a draft order object to load customer shipping information.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetDraftOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of draft orders',
            'data'          => [ 'root_key' => 'draft_orders' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show orders last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show orders last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ids' => [
                    'description' => 'Filter by list of IDs.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter by draft order status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'invoice_sent', 'completed' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetDraftOrder' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific draft order',
            'data'          => [ 'root_key' => 'draft_order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountDraftOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of draft orders',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter by draft order status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'invoice_sent', 'completed' ],
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Count orders last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Count orders last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],

        'SendDraftOrderInvoice' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/draft_orders/{id}/send_invoice.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Send an invoice for the draft order',
            'data'          => [ 'root_key' => 'draft_order_invoice' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'to' => [
                    'description' => 'Email to send to.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'from' => [
                    'description' => 'Email to send from.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'bcc' => [
                    'description' => 'Email to BCC.',
                    'location'    => 'query',
                    'type'        => 'array',
                    'required'    => false
                ],
                'subject' => [
                    'description' => 'Subject of the email.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'custom_message' => [
                    'description' => 'Custom contents of the email.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteDraftOrder' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete the draft order from the database',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CompleteDraftOrder' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/draft_orders/{id}/complete.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Complete a draft order, marking it as paid',
            'data'          => [ 'root_key' => 'draft_order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'payment_pending' => [
                    'description' => 'Set whether the order has already been paid for.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Event
         * https://shopify.dev/api/admin/rest/reference/events/event
         * ---------------------------------------------------------------------------------------------
         */
        'GetEvents' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/events.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of events',
            'data'          => [ 'root_key' => 'events' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show events last created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show events last created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'filter' => [
                    'description' => 'Show events specified in this filter.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'verb' => [
                    'description' => 'Show events of a certain type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetEvent' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/events/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific event',
            'data'          => [ 'root_key' => 'event' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountEvents' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/events/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of events',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'created_at_min' => [
                    'description' => 'Count only events created at or after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Count only events created at or before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Fulfillment
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillment
         * ---------------------------------------------------------------------------------------------
         */
        'GetFulfillments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{fulfillment_order_id}/fulfillments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves fulfillments associated with an order.',
            'data'          => [ 'root_key' => 'fulfillments' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order that is associated with the fulfillments.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show fulfillments created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show fulfillments created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show fulfillments last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show fulfillments last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetFulfillmentOrderFulfillments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/fulfillment_order/{fulfillment_order_id}/fulfillments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves fulfillments associated with a fulfillment order',
            'data'          => [ 'root_key' => 'fulfillments' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountFulfillments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of fulfillments associated with a specific order',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to count fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'created_at_min' => [
                    'description' => 'Show fulfillments created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show fulfillments created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show fulfillments last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show fulfillments last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],

        'GetFulfillment' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a single Fulfillment',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a fulfillment for a given order',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'location_id' => [
                    'description' => 'The unique identifier of the location that the fulfillment should be processed for.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'A historical record of each item in the fulfillment.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tracking_number' => [
                    'description' => 'Tracking number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'notify_customer' => [
                    'description' => 'Whether the customer should be notified.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tracking_company' => [
                    'description' => 'The name of the tracking company.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tracking_number' => [
                    'description' => 'Tracking number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tracking_numbers' => [
                    'description' => 'A list of tracking numbers, provided by the shipping company.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tracking_url' => [
                    'description' => 'Tracking page for the fulfillment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tracking_urls' => [
                    'description' => 'The URLs of tracking pages for the fulfillment.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'CreateFulfillmentOrderFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a fulfillment for one or many fulfillment orders. The fulfillment orders are associated with the same order and are assigned to the same location.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => false
                ],
                'notify_customer' => [
                    'description' => 'Whether the customer should be notified.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tracking_info' => [
                    'description' => 'Tracking information',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'line_items_by_fulfillment_order' => [
                    'description' => 'Line items by fulfillment order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'UpdateFulfillment' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update information associated with a fulfillment.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'tracking_number' => [
                    'description' => 'Tracking number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'notify_customer' => [
                    'description' => 'Whether the customer should be notified.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'UpdateFulfillmentOrderFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillments/{id}/update_tracking.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates the tracking information for a fulfillment.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'tracking_info' => [
                    'description' => 'Tracking information',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'notify_customer' => [
                    'description' => 'Whether the customer should be notified.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'CompleteFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}/complete.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Mark a fulfillment as complete.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'OpenFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}/open.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Transition a fulfillment from pending to open.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CancelFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}/cancel.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Cancel a fulfillment for a specific order ID.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CancelFulfillmentOrderFulfillment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillments/{id}/cancel.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Cancels a fulfillment.',
            'data'          => [ 'root_key' => 'fulfillment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * FulfillmentEvent
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentevent
         * ---------------------------------------------------------------------------------------------
         */
        'GetFulfillmentEvents' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{fulfillment_id}/events.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a list of fulfillment events for a specific fulfillment',
            'data'             => [ 'root_key' => 'fulfillment_events' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fulfillment_id' => [
                    'description' => 'The ID of the fulfillment that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetFulfillmentEvent' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{fulfillment_id}/events/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a specific fulfillment event',
            'data'             => [ 'root_key' => 'fulfillment_event' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fulfillment_id' => [
                    'description' => 'The ID of the fulfillment that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The ID of the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateFulfillmentEvent' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{fulfillment_id}/events.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a fulfillment event',
            'data'          => [
                'root_key_request'  => 'event',
                'root_key_response' => 'fulfillment_event'
            ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fulfillment_id' => [
                    'description' => 'The ID of the fulfillment that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address1' => [
                    'description' => 'The street address where the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'city' => [
                    'description' => 'The city where the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country' => [
                    'description' => 'The country where the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'latitude' => [
                    'description' => 'A geographic coordinate specifying the latitude of the fulfillment event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'longitude' => [
                    'description' => 'A geographic coordinate specifying the longitude of the fulfillment event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'province' => [
                    'description' => 'The province where the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'zip' => [
                    'description' => 'The zip code of the location where the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'estimated_delivery_at' => [
                    'description' => 'The estimated delivery date based on the fulfillment\'s tracking number, as long as it\'s provided by one of the following carriers: USPS, FedEx, UPS, or Canada Post (Canada only).',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'happened_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the fulfillment event occurred.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'message' => [
                    'description' => 'An arbitrary message describing the status. Can be provided by a shipping carrier.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shop_id' => [
                    'description' => 'An ID for the shop that\'s associated with the fulfillment event.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'The status of the fulfillment event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'label_printed',
                        'label_purchased',
                        'attempted_delivery',
                        'ready_for_pickup',
                        'picked_up',
                        'confirmed',
                        'in_transit',
                        'out_for_delivery',
                        'delivered',
                        'failure'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'DeleteFulfillmentEvent' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/orders/{order_id}/fulfillments/{fulfillment_id}/events/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a fulfillment event',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fulfillment_id' => [
                    'description' => 'The ID of the fulfillment that\'s associated with the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The ID of the fulfillment event.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * FulfillmentOrder
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentorder
         * ---------------------------------------------------------------------------------------------
         */
        'GetFulfillmentOrders' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillment_orders.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a list of fulfillment orders for a specific order',
            'data'             => [ 'root_key' => 'fulfillment_orders' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that is associated with the fulfillment orders',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetFulfillmentOrder' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a specific fulfillment order',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The ID of the fulfillment order to retrieve',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CancelFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}/cancel.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks a fulfillment order as cancelled',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CloseFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}/close.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks an in progress fulfillment order as incomplete, indicating the fulfillment service is unable to ship any remaining items and intends to close the fulfillment order',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional reason for marking the fulfillment order as incomplete.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'MoveFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}/move.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Moves a fulfillment order from one merchant managed location to another merchant managed location',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'new_location_id' => [
                    'description' => 'The ID of the location to which the fulfillment order will be moved.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'OpenFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}/open.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks a scheduled fulfillment order as ready for fulfillment',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'RescheduleFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{id}/reschedule.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'The datetime (in UTC) when the fulfillment order is ready for fulfillment. When this datetime is reached, a scheduled fulfillment order is automatically transitioned to open.',
            'data'             => [ 'root_key' => 'fulfillment_order' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'new_fulfill_at' => [
                    'description' => 'Fulfillment Order date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * FulfillmentRequest
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentrequest
         * ---------------------------------------------------------------------------------------------
         */
        'SendFulfillmentRequest' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/fulfillment_request.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Sends a fulfillment request to the fulfillment service of a fulfillment order.',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional message for the fulfillment request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fulfillment_order_line_items' => [
                    'description' => 'The fulfillment order line items to be requested for fulfillment. If left blank, all line items of the fulfillment order are requested for fulfillment.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'AcceptFulfillmentRequest' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/fulfillment_request/accept.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Accepts a fulfillment request sent to a fulfillment service for a fulfillment order.',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional message for the fulfillment request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'RejectFulfillmentRequest' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/fulfillment_request/accept.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Rejects a fulfillment request sent to a fulfillment service for a fulfillment order.',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'message' => [
                    'description' => 'An optional message for the fulfillment request.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * FulfillmentService
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/fulfillmentservice
         * ---------------------------------------------------------------------------------------------
         */
        'GetFulfillmentServices' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/fulfillment_services.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Receive a list of all FulfillmentServices.',
            'data'             => [ 'root_key' => 'fulfillment_services' ],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'scope' => [
                    'description' => 'Defines what should be returned.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'current_client', 'all' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateFulfillmentService' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/fulfillment_services.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new FulfillmentService.',
            'data'          => [ 'root_key' => 'fulfillment_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'callback_url' => [
                    'description' => 'States the URL endpoint that Shopify needs to retrieve inventory and tracking updates.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'format' => [
                    'description' => 'Specifies the format of the API output.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'json', 'xml' ],
                    'required'    => false
                ],
                'fulfillment_orders_opt_in' => [
                    'description' => 'Whether the fulfillment service wants to register for APIs related to fulfillment orders.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the fulfillment service generated from its title.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'location_id' => [
                    'description' => 'The unique identifier of the location tied to the fulfillment service',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'name' => [
                    'description' => 'The name of the fulfillment service as seen by merchants and their customers.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'provider_id' => [
                    'description' => 'A unique identifier for the fulfillment service provider.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'requires_shipping_method' => [
                    'description' => 'States if the fulfillment service requires products to be physically shipped.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tracking_support' => [
                    'description' => 'States if the fulfillment service provides tracking numbers for packages.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'GetFulfillmentService' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/fulfillment_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a single FulfillmentService.',
            'data'          => [ 'root_key' => 'fulfillment_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateFulfillmentService' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/fulfillment_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Modify an existing FulfillmentService.',
            'data'          => [ 'root_key' => 'fulfillment_service' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'callback_url' => [
                    'description' => 'States the URL endpoint that Shopify needs to retrieve inventory and tracking updates.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'format' => [
                    'description' => 'Specifies the format of the API output.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'json', 'xml' ],
                    'required'    => false
                ],
                'fulfillment_orders_opt_in' => [
                    'description' => 'Whether the fulfillment service wants to register for APIs related to fulfillment orders.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the fulfillment service generated from its title.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'location_id' => [
                    'description' => 'The unique identifier of the location tied to the fulfillment service',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'name' => [
                    'description' => 'The name of the fulfillment service as seen by merchants and their customers.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'provider_id' => [
                    'description' => 'A unique identifier for the fulfillment service provider.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'requires_shipping_method' => [
                    'description' => 'States if the fulfillment service requires products to be physically shipped.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tracking_support' => [
                    'description' => 'States if the fulfillment service provides tracking numbers for packages.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'DeleteFulfillmentService' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/fulfillment_services/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Remove an existing FulfillmentService.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * GiftCard
         * https://shopify.dev/api/admin/rest/reference/plus/giftcard
         * ---------------------------------------------------------------------------------------------
         */
        'GetGiftCards' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/gift_cards.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a list of all Gift Cards',
            'data'          => [ 'root_key' => 'gift_cards' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'status' => [
                    'description' => 'Retrieve gift cards with a given status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'enabled', 'disabled' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetGiftCard' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/gift_cards/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a single Gift Card',
            'data'          => [ 'root_key' => 'gift_card' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountGiftCards' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/gift_cards/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of gift cards',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'status' => [
                    'description' => 'Retrieve gift cards with a given status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'enabled', 'disabled' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateGiftCard' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/gift_cards.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new Gift Card',
            'data'          => [ 'root_key' => 'gift_card' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'initial_value' => [
                    'description' => 'The initial Gift Card value',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'The gift card code, which is a string of alphanumeric characters. For security reasons, this is available only upon creation of the gift card. (minimum: 8 characters, maximum: 20 characters)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 8,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The currency of the gift card.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'customer_id' => [
                    'description' => 'The ID of a customer who is associated with this gift card.',
                    'location'    => 'json',
                    'type'        => 'int',
                    'required'    => false
                ],
                'expires_on' => [
                    'description' => 'The date (YYYY-MM-DD format) when the gift card expires.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'date-time',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'The text of an optional note that a merchant can attach to the gift card. Not visible to customers.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template that\'s used to render the gift card online. For example, if the value is birthday, then the gift card is rendered using the template gift_card.birthday.liquid. When the value is null, the default gift_card.liquid template is used.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdateGiftCard' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/gift_cards/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates an existing gift card.',
            'data'          => [ 'root_key' => 'gift_card' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'expires_on' => [
                    'description' => 'The date (YYYY-MM-DD format) when the gift card expires.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'date-time',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'The text of an optional note that a merchant can attach to the gift card. Not visible to customers.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template that\'s used to render the gift card online. For example, if the value is birthday, then the gift card is rendered using the template gift_card.birthday.liquid. When the value is null, the default gift_card.liquid template is used.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DisableGiftCard' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/gift_cards/{id}/disable.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Disabling a Gift Card is permanent and cannot be undone',
            'data'          => [ 'root_key' => 'gift_card' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'SearchGiftCards' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/gift_cards/search.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Searches for gift cards that match a supplied query.',
            'data'          => [ 'root_key' => 'gift_cards' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'query' => [
                    'description' => 'The text to search for.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order' => [
                    'description' => 'Field and direction to order results by',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * InventoryItem
         * https://shopify.dev/api/admin/rest/reference/inventory/inventoryitem
         * ---------------------------------------------------------------------------------------------
         */
        'GetInventoryItems' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/inventory_items.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of inventory items by passed identifiers',
            'data'          => [ 'root_key' => 'inventory_items' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Comma seperated list of IDs',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => true
                ],
                'page' => [
                    'description' => 'Page to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ]
            ]
        ],

        'GetInventoryItem' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/inventory_items/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific inventory item',
            'data'          => [ 'root_key' => 'inventory_item' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Inventory Item ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'UpdateInventoryItem' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/inventory_items/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update a specific inventory item',
            'data'          => [ 'root_key' => 'inventory_item' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Inventory Item ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * InventoryLevel
         * https://shopify.dev/api/admin/rest/reference/inventory/inventorylevel
         * ---------------------------------------------------------------------------------------------
         */
        'GetInventoryLevels' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/inventory_levels.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of inventory levels either by passed inventory item IDs, location IDs or both',
            'data'          => [ 'root_key' => 'inventory_levels' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_ids' => [
                    'description' => 'Comma seperated list of inventory item IDs',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'location_ids' => [
                    'description' => 'Comma seperated list of location IDs',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'page' => [
                    'description' => 'Page to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ]
            ]
        ],

        'AdjustInventoryLevel' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/inventory_levels/adjust.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Adjusts the inventory level of an inventory item at a single location',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'available_adjustment' => [
                    'description' => 'The amount to adjust the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteInventoryLevel' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/inventory_levels.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes an inventory level',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'ConnectInventoryLevel' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/inventory_levels/connect.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Connects an inventory item to a location by creating an inventory level at that location',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'relocate_if_necessary' => [
                    'description' => 'The amount to adjust the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'SetInventoryLevel' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/inventory_levels/set.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Sets the inventory level for an inventory item at a location',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'available' => [
                    'description' => 'Sets the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'disconnect_if_necessary' => [
                    'description' => 'Whether inventory for any previously connected locations will be set to 0 and the locations disconnected',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Location
         * https://shopify.dev/api/admin/rest/reference/inventory/location
         * ---------------------------------------------------------------------------------------------
         */
        'GetLocations' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/locations.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of locations',
            'data'          => [ 'root_key' => 'locations' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetLocation' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/locations/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific location',
            'data'          => [ 'root_key' => 'location' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Location ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountLocations' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/locations/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a count of locations',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetLocationInventoryLevels' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/locations/{id}/inventory_levels.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific location',
            'data'          => [ 'root_key' => 'inventory_levels' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Location ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * LocationsForMove
         * https://shopify.dev/api/admin/rest/reference/shipping-and-fulfillment/locationsformove
         * ---------------------------------------------------------------------------------------------
         */
        'GetLocationsForMove' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/locations_for_move.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of locations that a fulfillment order can potentially move to.',
            'data'          => [ 'root_key' => 'locations_for_move' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * MarketingEvent
         * https://shopify.dev/api/admin/rest/reference/marketingevent
         * ---------------------------------------------------------------------------------------------
         */
        'GetMarketingEvents' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/marketing_events.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all marketing events',
            'data'          => [ 'root_key' => 'marketing_events' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'offset' => [
                    'description' => 'The number of marketing events to skip',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'CountMarketingEvents' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/marketing_events/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of all marketing events',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetMarketingEvent' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/marketing_events/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single marketing event',
            'data'          => [ 'root_key' => 'marketing_event' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Marketing Event ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateMarketingEvent' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/marketing_events.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a marketing event',
            'data'          => [ 'root_key' => 'marketing_event' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'event_type' => [
                    'description' => 'The type of marketing event',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'ad', 'post', 'message', 'retargeting', 'transactional', 'affiliate', 'loyalty', 'newsletter', 'abandoned_cart' ],
                    'required'    => true
                ],
                'marketing_channel' => [
                    'description' => 'The channel that your marketing event will use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'search', 'display', 'social', 'email', 'referral' ],
                    'required'    => true
                ],
                'paid' => [
                    'description' => 'Whether the event is paid or organic',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => true
                ],
                'started_at' => [
                    'description' => 'The time when the marketing action was started',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ],
                'remote_id' => [
                    'description' => 'An optional remote identifier for a marketing event. The remote identifier lets Shopify validate engagement data',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'referring_domain' => [
                    'description' => 'The destination domain of the marketing event. Required if the "marketing_channel" is set to "search" or "social"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'budget' => [
                    'description' => 'The budget of the ad campaign',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The currency for the budget. Required if budget is specified.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'budget_type' => [
                    'description' => 'The type of the budget. Required if "budget" is specified.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'daily', 'lifetime' ],
                    'required'    => false
                ],
                'scheduled_to_end_at' => [
                    'description' => 'For events with a duration, the time when the event was scheduled to end.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ended_at' => [
                    'description' => 'For events with a duration, the time when the event actually ended.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'utm_campaign' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'utm_source' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'utm_medium' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'description' => [
                    'description' => 'A description of the marketing event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'manage_url' => [
                    'description' => 'A link to manage the marketing event. In most cases, this links to the app that created the event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'preview_url' => [
                    'description' => 'A link to the live version of the event, or to a rendered preview in the app that created it.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'marketed_resources' => [
                    'description' => 'A list of the items that were marketed in the marketing event. Includes the type and id of each item.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateMarketingEvent' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/marketing_events/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a marketing event',
            'data'          => [ 'root_key' => 'marketing_event' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Marketing Event ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'started_at' => [
                    'description' => 'The time when the marketing action was started',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'remote_id' => [
                    'description' => 'An optional remote identifier for a marketing event. The remote identifier lets Shopify validate engagement data',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'budget' => [
                    'description' => 'The budget of the ad campaign',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The currency for the budget. Required if budget is specified.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'budget_type' => [
                    'description' => 'The type of the budget. Required if "budget" is specified.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'daily', 'lifetime' ],
                    'required'    => false
                ],
                'scheduled_to_end_at' => [
                    'description' => 'For events with a duration, the time when the event was scheduled to end.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ended_at' => [
                    'description' => 'For events with a duration, the time when the event actually ended.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'utm_campaign' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'utm_source' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'utm_medium' => [
                    'description' => 'The UTM parameters used in the links provided in the marketing event. Values must be unique and should not be url-encoded.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'description' => [
                    'description' => 'A description of the marketing event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'manage_url' => [
                    'description' => 'A link to manage the marketing event. In most cases, this links to the app that created the event.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'preview_url' => [
                    'description' => 'A link to the live version of the event, or to a rendered preview in the app that created it.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'marketed_resources' => [
                    'description' => 'A list of the items that were marketed in the marketing event. Includes the type and id of each item.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteMarketingEvent' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/marketing_events/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a marketing event',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Marketing Event ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateMarketingEventEngagements' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/marketing_events/{id}/engagements.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates marketing engagements on a marketing event',
            'data'          => [ 'root_key_response' => 'engagements' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Marketing Event ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'engagements' => [
                    'description' => 'Engagement objects to be created.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Metafield
         * https://shopify.dev/api/admin/rest/reference/metafield
         * ---------------------------------------------------------------------------------------------
         */
        'GetArticleMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to an Article resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetBlogMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Blog resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCollectionMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Custom or Smart Collection resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCustomerMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Customer resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetDraftOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Draft Order resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to an Order resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetPageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Page resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Product resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductVariantMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Product Variant resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductImageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of metafields that belong to a Product Image resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetShopMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve metafields that belong to a Shop resource',
            'data'          => [ 'root_key' => 'metafields' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show metafields created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show metafields created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show metafields last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show metafields last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'namespace' => [
                    'description' => 'Show metafields with given namespace',
                    'location'    => 'query',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => false
                ],
                'key' => [
                    'description' => 'Show metafields with given key',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountArticleMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to an Article resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountBlogMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Blog resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountCollectionMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Custom or Smart Collection resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountCustomerMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Customer resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountDraftOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Draft Order resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to an Order resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountPageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Page resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountProductMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Product resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountProductVariantMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Product Variant resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountProductImageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count ofs a list of metafields that belong to a Product Image resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ]
            ]
        ],

        'CountShopMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of metafields that belong to a Shop resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetArticleMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to an Article',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetBlogMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Blog',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCollectionMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Collection',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetCustomerMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Customer',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetDraftOrderMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a DraftOrder',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetOrderMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to am Order',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetPageMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Page',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Product',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductVariantMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a ProductVariant',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProductImageMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a ProductImage',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetShopMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single metafield that belongs to a Shop',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateArticleMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for an Article resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateBlogMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Blog resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCollectionMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Custom or Smart Collection resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateCustomerMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Customer resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateDraftOrderMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Draft Order resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateOrderMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for an Order resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreatePageMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Page resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateProductMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Product resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateProductVariantMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Product Variant resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateProductImageMetafield' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for an Product Image resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'CreateShopMetafield' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new metafield for a Shop resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateArticleMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for an Article resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateBlogMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Blog resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateCollectionMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Custom or Smart Collection resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateCustomerMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Customer resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateDraftOrderMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Draft Order resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateOrderMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for an Order resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdatePageMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Page resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateProductMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Product resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateProductVariantMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Product Variant resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateProductImageMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for an Product Image resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateShopMetafield' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a metafield for a Shop resource',
            'data'          => [ 'root_key' => 'metafield' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'The name of the metafield.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 3,
                    'maxLength'   => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'minLength'   => 2,
                    'maxLength'   => 20,
                    'required'    => true
                ],
                'value' => [
                    'description' => 'The information to be stored as metadata.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'integer' ],
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => false
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => false
                ],
                'type' => [
                    'description' => 'The metafield\'s information type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'single_line_text_field',
                        'multi_line_text_field',
                        'page_reference',
                        'product_reference',
                        'variant_reference',
                        'file_reference',
                        'number_integer',
                        'number_decimal',
                        'date',
                        'date_time',
                        'url',
                        'json',
                        'boolean',
                        'color',
                        'weight',
                        'volume',
                        'dimension',
                        'rating'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'DeleteArticleMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/{article_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for an Article resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'article_id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteBlogMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Blog resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteCollectionMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/collections/{collection_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Custom or Smart Collection resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteCustomerMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/customers/{customer_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Customer resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteDraftOrderMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/draft_orders/{draft_order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Draft Order resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'draft_order_id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteOrderMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/customers/{order_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for an Order resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeletePageMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/pages/{page_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Page resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'page_id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteProductMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/products/{product_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Product resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteProductVariantMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{product_variant_id}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Product Variant resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_variant_id' => [
                    'description' => 'Product Variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteProductImageMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for an Product Image resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'owner_id' => [
                    'description' => 'Owner ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'metafield[owner_id]',
                    'required'    => true
                ],
                'owner_resource' => [
                    'description' => 'Owner resource',
                    'location'    => 'query',
                    'type'        => 'string',
                    'sentAs'      => 'metafield[owner_resource]',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteShopMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a metafield for a Shop resource',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * MobilePlatformApplication
         * https://shopify.dev/api/admin/rest/reference/sales-channels/mobileplatformapplication
         * ---------------------------------------------------------------------------------------------
         */
        'GetMobilePlatformApplications' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/mobile_platform_applications.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'List all of the mobile platform applications associated with the app',
            'data'          => [ 'root_key' => 'mobile_platform_applications' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'CreateMobilePlatformApplication' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/mobile_platform_applications.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a mobile platform application',
            'data'          => [ 'root_key' => 'mobile_platform_application' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'application_id' => [
                    'description' => 'iOS App ID or Android application ID of the application.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'platform' => [
                    'description' => 'The platform of the application.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'sha256_cert_fingerprints' => [
                    'description' => 'The SHA256 fingerprints of the app’s signing certificate. (Android only)',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'enabled_universal_or_app_links' => [
                    'description' => 'Whether the application supports iOS universal links and Android App Links. If true, then URLs can be set up to link directly to the application. If false, then URLs can\'t link directly to the application.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'enabled_shared_webcredentials' => [
                    'description' => 'Whether the application supports iOS shared web credentials.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'GetMobilePlatformApplication' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/mobile_platform_applications/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Get a mobile platform application',
            'data'          => [ 'root_key' => 'mobile_platform_application' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Unique numeric identifier for the mobile platform application.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateMobilePlatformApplication' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/mobile_platform_applications/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a mobile platform application',
            'data'          => [ 'root_key' => 'mobile_platform_application' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'application_id' => [
                    'description' => 'iOS App ID or Android application ID of the application.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'platform' => [
                    'description' => 'The platform of the application.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'sha256_cert_fingerprints' => [
                    'description' => 'The SHA256 fingerprints of the app’s signing certificate. (Android only)',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'enabled_universal_or_app_links' => [
                    'description' => 'Whether the application supports iOS universal links and Android App Links. If true, then URLs can be set up to link directly to the application. If false, then URLs can\'t link directly to the application.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'enabled_shared_webcredentials' => [
                    'description' => 'Whether the application supports iOS shared web credentials.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'DeleteMobilePlatformApplication' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/mobile_platform_applications/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a mobile platform application',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Unique numeric identifier for the mobile platform application.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Order
         * https://shopify.dev/api/admin/rest/reference/orders/order
         * ---------------------------------------------------------------------------------------------
         */
        'GetOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of orders',
            'data'          => [ 'root_key' => 'orders' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Retrieve only orders specified by a comma-separated list of order IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show on a page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Show orders after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show orders last created at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show orders last created at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show orders last updated at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show orders last updated at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at_min' => [
                    'description' => 'Show orders imported at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at_max' => [
                    'description' => 'Show orders imported at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'attribution_app_id' => [
                    'description' => 'Show orders attributed to a certain app, specified by the app ID. Set as current to show orders for the app currently consuming the API.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter orders by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ],
                    'required'    => false
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ],
                    'required'    => false
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Retrieve only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetOrder' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Retrieve only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountOrders' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the total number of orders that meet the specified criteria.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'created_at_min' => [
                    'description' => 'Show orders last created at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show orders last created at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show orders last updated at or after date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show orders last updated at or before date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter orders by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ],
                    'required'    => false
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ],
                    'required'    => false
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ],
                    'required'    => false
                ]
            ]
        ],

        'CloseOrder' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{id}/close.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Close a specific order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'OpenOrder' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{id}/open.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Re-open a closed order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CancelOrder' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{id}/cancel.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Cancel a given order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'amount' => [
                    'description' => 'The amount to refund. If set, Shopify attempts to void or refund the payment, depending on its status. Shopify refunds through a manual gateway in cases where the original transaction was not made in Shopify. Refunds through a manual gateway are recorded as a refund on Shopify, but the customer is not refunded.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The currency of the refund that\'s issued when the order is canceled. Required for multi-currency orders whenever the amount property is provided.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'reason' => [
                    'description' => 'The reason for the order cancellation.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'customer', 'inventory', 'fraud', 'declined', 'other' ],
                    'required'    => false
                ],
                'email' => [
                    'description' => 'Whether to send an email to the customer notifying them of the cancellation.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'refund' => [
                    'description' => 'The refund transactions to perform. Required for some more complex refund situations.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'CreateOrder' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'A list of line item objects, each containing information about an item in the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'billing_address' => [
                    'description' => 'The mailing address associated with the payment method. This address is an optional field that won\'t be available on orders that do not require a payment method.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'buyer_accepts_marketing' => [
                    'description' => 'Whether the customer consented to receive email updates from the shop.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'customer' => [
                    'description' => 'Information about the customer. The order might not have a customer and apps should not depend on the existence of a customer object. This value might be null if the order was created through Shopify POS.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'discount_codes' => [
                    'description' => 'A list of discounts applied to the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'estimated_taxes' => [
                    'description' => 'Whether taxes on the order are estimated. Many factors can change between the time a customer places an order and the time the order is shipped, which could affect the calculation of taxes. This property returns false when taxes on the order are finalized and aren\'t subject to any changes.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'financial_status' => [
                    'description' => 'The status of payments associated with the order. Can only be set when the order is created.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ],
                    'required'    => false
                ],
                'fulfillments' => [
                    'description' => 'An array of fulfillments associated with the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'fulfillment_status' => [
                    'description' => 'The order\'s status in terms of fulfilled line items.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ],
                    'required'    => false
                ],
                'location_id' => [
                    'description' => 'The ID of the physical location where the order was processed.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'An optional note that a shop owner can attach to the order.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note_attributes' => [
                    'description' => 'Extra information that is added to the order. Appears in the Additional details section of an order details page. Each array entry must contain a hash with name and value keys.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number for receiving SMS notifications.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'presentment_currency' => [
                    'description' => 'The presentment currency that was used to display prices to the customer.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'processed_at' => [
                    'description' => 'The date and time (ISO 8601 format) when an order was processed. This value is the date that appears on your orders and that\'s used in the analytic reports. If you\'re importing orders from an app or another platform, then you can set processed_at to a date and time in the past to match when the original order was created.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'referring_site' => [
                    'description' => 'The website where the customer clicked a link to the shop.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the order will be shipped. This address is optional and will not be available on orders that do not require shipping.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_lines' => [
                    'description' => 'An array of objects, each of which details a shipping method used.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'source_name' => [
                    'description' => 'Where the order originated. Can be set only during order creation, and is not writeable afterwards.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'web', 'pos', 'shopify_draft_order', 'iphone', 'android' ],
                    'required'    => false
                ],
                'subtotal_price' => [
                    'description' => 'The price of the order in the shop currency after discounts but before shipping, duties, taxes, and tips.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'subtotal_price_set' => [
                    'description' => 'The price of the order in the shop currency after discounts but before shipping, duties, taxes, and tips.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags attached to the order, formatted as a string of comma-separated values. Tags are additional short descriptors, commonly used for filtering and searching. Each individual tag is limited to 40 characters in length.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'tax_lines' => [
                    'description' => 'An array of tax line objects, each of which details a tax applicable to the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'taxes_included' => [
                    'description' => 'Whether taxes are included in the order subtotal.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'test' => [
                    'description' => 'Whether this is a test order.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'total_discounts' => [
                    'description' => 'The total discounts applied to the price of the order in the shop currency.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'total_discounts_set' => [
                    'description' => 'The total discounts applied to the price of the order in shop and presentment currencies.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'total_line_items_price' => [
                    'description' => 'The sum of all line item prices in the shop currency.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'total_line_items_price_set' => [
                    'description' => 'The total of all line item prices in shop and presentment currencies.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'total_outstanding' => [
                    'description' => 'The total outstanding amount of the order in the shop currency.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'total_price' => [
                    'description' => 'The sum of all line item prices, discounts, shipping, taxes, and tips in the shop currency. Must be positive.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'minimum'     => 0,
                    'required'    => false
                ],
                'total_price_set' => [
                    'description' => 'The total price of the order in shop and presentment currencies.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'total_shipping_price_set' => [
                    'description' => 'The total shipping price of the order, excluding discounts and returns, in shop and presentment currencies. If taxes_included is set to true, then total_shipping_price_set includes taxes.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'total_tax' => [
                    'description' => 'The sum of all the taxes applied to the order in the shop currency. Must be positive.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'minimum'     => 0,
                    'required'    => false
                ],
                'total_tax_set' => [
                    'description' => 'The total tax applied to the order in shop and presentment currencies.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'total_weight' => [
                    'description' => 'The sum of all line item weights in grams. The sum is not adjusted as items are removed from the order.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'user_id' => [
                    'description' => 'The ID of the user logged into Shopify POS who processed the order, if applicable.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'inventory_behaviour' => [
                    'description' => 'The behaviour to use when updating inventory.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'bypass', 'decrement_ignoring_policy', 'decrement_obeying_policy' ],
                    'required'    => false
                ],
                'send_receipt' => [
                    'description' => 'The behaviour to use when updating inventory.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_fulfillment_receipt' => [
                    'description' => 'Whether to send a shipping confirmation to the customer.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'UpdateOrder' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing order',
            'data'          => [ 'root_key' => 'order' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'buyer_accepts_marketing' => [
                    'description' => 'Whether the customer consented to receive email updates from the shop.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'The customer\'s email address.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fulfillments' => [
                    'description' => 'An array of fulfillments associated with the order.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'fulfillment_status' => [
                    'description' => 'The order\'s status in terms of fulfilled line items.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ],
                    'required'    => false
                ],
                'note' => [
                    'description' => 'An optional note that a shop owner can attach to the order.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'note_attributes' => [
                    'description' => 'Extra information that is added to the order. Appears in the Additional details section of an order details page. Each array entry must contain a hash with name and value keys.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'phone' => [
                    'description' => 'The customer\'s phone number for receiving SMS notifications.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_address' => [
                    'description' => 'The mailing address to where the order will be shipped. This address is optional and will not be available on orders that do not require shipping.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'shipping_lines' => [
                    'description' => 'An array of objects, each of which details a shipping method used.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'Tags attached to the order, formatted as a string of comma-separated values. Tags are additional short descriptors, commonly used for filtering and searching. Each individual tag is limited to 40 characters in length.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'send_fulfillment_receipt' => [
                    'description' => 'Whether to send a shipping confirmation to the customer.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'DeleteOrder' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/orders/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an order',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Order Risk
         * https://shopify.dev/api/admin/rest/reference/orders/order-risk
         * ---------------------------------------------------------------------------------------------
         */
        'CreateOrderRisk' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/risks.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates an order risk for an order',
            'data'          => [ 'root_key' => 'risk' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that the order risk belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'cause_cancel' => [
                    'description' => 'Whether this order risk is severe enough to force the cancellation of the order. If true, then this order risk is included in the Order canceled message that\'s shown on the details page of the canceled order.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'checkout_id' => [
                    'description' => 'The ID of the checkout that the order risk belongs to.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'display' => [
                    'description' => 'Whether the order risk is displayed on the order details page in the Shopify admin. If false, then this order risk is ignored when Shopify determines your app\'s overall risk level for the order.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'message' => [
                    'description' => 'The message that\'s displayed to the merchant to indicate the results of the fraud check. The message is displayed only if display is set totrue.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'recommendation' => [
                    'description' => 'The recommended action given to the merchant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'cancel', 'investigate', 'accept' ],
                    'required'    => false
                ],
                'score' => [
                    'description' => 'For internal use only. A number between 0 and 1 that\'s assigned to the order. The closer the score is to 1, the more likely it is that the order is fraudulent.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'minimum'     => 0,
                    'maximum'     => 1,
                    'required'    => false
                ],
                'source' => [
                    'description' => 'The source of the order risk.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetOrderRisks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/risks.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all order risks for an order',
            'data'          => [ 'root_key' => 'risks' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that the order risk belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetOrderRisk' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/risks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single order risk by its ID',
            'data'          => [ 'root_key' => 'risk' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that the order risk belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'A unique numeric identifier for the order risk.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateOrderRisk' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/orders/{order_id}/risks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates an order risk',
            'data'          => [ 'root_key' => 'risk' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that the order risk belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'A unique numeric identifier for the order risk.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'cause_cancel' => [
                    'description' => 'Whether this order risk is severe enough to force the cancellation of the order. If true, then this order risk is included in the Order canceled message that\'s shown on the details page of the canceled order.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'checkout_id' => [
                    'description' => 'The ID of the checkout that the order risk belongs to.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'message' => [
                    'description' => 'The message that\'s displayed to the merchant to indicate the results of the fraud check. The message is displayed only if display is set totrue.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'recommendation' => [
                    'description' => 'The recommended action given to the merchant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'cancel', 'investigate', 'accept' ],
                    'required'    => false
                ],
                'score' => [
                    'description' => 'For internal use only. A number between 0 and 1 that\'s assigned to the order. The closer the score is to 1, the more likely it is that the order is fraudulent.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'minimum'     => 0,
                    'maximum'     => 1,
                    'required'    => false
                ],
                'source' => [
                    'description' => 'The source of the order risk.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteOrderRisk' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/orders/{order_id}/risks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes an order risk for an order',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that the order risk belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'A unique numeric identifier for the order risk.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Page
         * https://shopify.dev/api/admin/rest/reference/online-store/page
         * ---------------------------------------------------------------------------------------------
         */
        'GetPages' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of pages',
            'data'          => [ 'root_key' => 'pages' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'title' => [
                    'description' => 'Retrieve pages with a given title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Retrieve a page with a given handle.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show pages created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show pages created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show pages last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show pages last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show pages published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show pages published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false,
                ]
            ]
        ],

        'CountPages' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of pages',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Retrieve pages with a given title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show pages created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show pages created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show pages last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show pages last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show pages published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show pages published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ]
            ]
        ],

        'GetPage' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific page',
            'data'          => [ 'root_key' => 'page' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreatePage' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/pages.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new page',
            'data'          => [ 'root_key' => 'page' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Page title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'author' => [
                    'description' => 'The name of the person who created the page.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The text content of the page, complete with HTML markup.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A unique, human-friendly string for the page, generated automatically from its title. In online store themes, the Liquid templating language refers to a page by its handle.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the page should be published or not.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template being used. For example, if the value is contact, then the page is using the page.contact.liquid template. If the value is an empty string, then the page is using the default page.liquid template.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdatePage' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/pages/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing page',
            'data'          => [ 'root_key' => 'page' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Page title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'author' => [
                    'description' => 'The name of the person who created the page.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The text content of the page, complete with HTML markup.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A unique, human-friendly string for the page, generated automatically from its title. In online store themes, the Liquid templating language refers to a page by its handle.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the page should be published or not.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template being used. For example, if the value is contact, then the page is using the page.contact.liquid template. If the value is an empty string, then the page is using the default page.liquid template.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeletePage' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/pages/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing page',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Payment
         * https://shopify.dev/api/admin/rest/reference/sales-channels/payment
         * ---------------------------------------------------------------------------------------------
         */
        'StoreCreditCard' => [
            'httpMethod'    => 'POST',
            'uri'           => 'https://elb.deposit.shopifycs.com/sessions',
            'responseModel' => 'GenericModel',
            'summary'       => 'Stores a credit card in the card vault. Credit cards cannot be sent to the Checkout API directly. They must be sent to the card vault, which in response will return a session ID. This session ID can then be used when calling the POST #{token}/payments.json endpoint. A session ID is valid only for a single call to the endpoint. The card vault has a static URL and is located at https://elb.deposit.shopifycs.com/sessions. It is also provided via the payment_url property on the Checkout resource.',
            'data'          => [
                'root_key_request'  => 'credit_card',
                'root_key_response' => 'id'
            ],
            'parameters'    => [
                'number' => [
                    'description' => 'The number on the credit card.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'first_name' => [
                    'description' => 'The first name of the cardholder.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'last_name' => [
                    'description' => 'The last name of the cardholder.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'month' => [
                    'description' => 'The expiry month of the credit card.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'year' => [
                    'description' => 'The expiry year of the credit card.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'verification_value' => [
                    'description' => 'The cvv of the credit card.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreatePayment' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/checkouts/{token}/payments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a payment on a checkout using the session ID returned by the card vault.',
            'data'          => [ 'root_key' => 'payment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'amount' => [
                    'description' => 'The amount of the payment.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'request_details' => [
                    'description' => 'The details of the request.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'session_id' => [
                    'description' => 'A session ID provided by the card vault when creating a payment session.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'unique_token' => [
                    'description' => 'A unique idempotency token generated by your app. This can be any value, but must be unique across all payment requests.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetPayments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/{token}/payments.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of payments on a particular checkout.',
            'data'          => [ 'root_key' => 'payments' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetPayment' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/{token}/payments/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single payment.',
            'data'          => [ 'root_key' => 'payment' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The payment ID.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountPayments' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/checkouts/{token}/payments/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Counts the number of payments attempted on a checkout.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'token' => [
                    'description' => 'The checkout token.',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Payout
         * https://shopify.dev/api/admin/rest/reference/shopify_payments/payout
         * ---------------------------------------------------------------------------------------------
         */
        'GetPayouts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/payouts.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Return a list of all payouts.',
            'data'          => [ 'root_key' => 'payouts' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Filter the response to payouts made after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'last_id' => [
                    'description' => 'Filter the response to payouts made before the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'date_min' => [
                    'description' => 'Filter the response to payouts made inclusively after the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date',
                    'required'    => false
                ],
                'date_max' => [
                    'description' => 'Filter the response to payouts made inclusively before the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date',
                    'required'    => false
                ],
                'date' => [
                    'description' => 'Filter the response to payouts made on the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Filter the response to payouts made with the specified status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'scheduled', 'in_transit', 'paid', 'failed', 'canceled' ],
                    'required'    => false
                ]
            ]
        ],

        'GetPayout' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shopify_payments/payouts/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Return a single payout.',
            'data'          => [ 'root_key' => 'payout' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The payout ID.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Policy
         * https://shopify.dev/api/admin/rest/reference/store-properties/policy
         * ---------------------------------------------------------------------------------------------
         */
        'GetPolicies' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/policies.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of the shop\'s policies',
            'data'          => [ 'root_key' => 'policies' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * PriceRule
         * https://shopify.dev/api/admin/rest/reference/discounts/pricerule
         * ---------------------------------------------------------------------------------------------
         */
        'CreatePriceRule' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/price_rules.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new price rule',
            'data'          => [ 'root_key' => 'price_rule' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'allocation_method' => [
                    'description' => 'Price rule allocation method',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'each', 'across' ],
                    'required'    => true
                ],
                'customer_selection' => [
                    'description' => 'Price rule customer selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'all', 'prerequisite' ],
                    'required'    => true
                ],
                'target_selection' => [
                    'description' => 'Price rule target selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'all', 'entitled' ],
                    'required'    => true
                ],
                'target_type' => [
                    'description' => 'Price rule target type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'line_item', 'shipping_line' ],
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Price rule title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'value' => [
                    'description' => 'Price rule value',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'value_type' => [
                    'description' => 'Price rule value type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'fixed_amount', 'percentage' ],
                    'required'    => true
                ],
                'starts_at' => [
                    'description' => 'Price rule starts at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ],
                'ends_at' => [
                    'description' => 'Price rule ends at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'entitled_country_ids' => [
                    'description' => 'A list of IDs of shipping countries that will be entitled to the discount. It can be used only with target_type set to shipping_line and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'entitled_product_ids' => [
                    'description' => 'A list of IDs of products that will be entitled to the discount. It can be used only with target_type set to line_item and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'entitled_variant_ids' => [
                    'description' => 'A list of IDs of product variants that will be entitled to the discount. It can be used only with target_type set to line_item and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'once_per_customer' => [
                    'description' => 'Whether the generated discount code will be valid only for a single use per customer. This is tracked using customer ID.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'prerequisite_customer_ids' => [
                    'description' => 'A list of customer IDs. For the price rule to be applicable, the customer must match one of the specified customers.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_quantity_range' => [
                    'description' => 'The minimum number of items for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_saved_search_ids' => [
                    'description' => 'A list of customer saved search IDs. For the price rule to be applicable, the customer must be in the group of customers matching a customer saved search.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_shipping_price_range' => [
                    'description' => 'The maximum shipping price for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_subtotal_range' => [
                    'description' => 'The minimum subtotal for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_to_entitlement_purchase' => [
                    'description' => 'The prerequisite purchase for a Buy X Get Y discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'usage_limit' => [
                    'description' => 'The maximum number of times the price rule can be used, per discount code.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'prerequisite_product_ids' => [
                    'description' => 'List of product ids that will be a prerequisites for a Buy X Get Y type discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_variant_ids' => [
                    'description' => 'List of variant ids that will be a prerequisites for a Buy X Get Y type discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_collection_ids' => [
                    'description' => 'List of collection ids that will be a prerequisites for a Buy X Get Y discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_to_entitlement_quantity_ratio' => [
                    'description' => 'Buy/Get ratio for a Buy X Get Y discount. prerequisite_quantity defines the necessary \'buy\' quantity and entitled_quantity the offered \'get\' quantity.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'allocation_limit' => [
                    'description' => 'The number of times the discount can be allocated on the cart - if eligible. For example a Buy 1 hat Get 1 hat for free discount can be applied 3 times on a cart having more than 6 hats, where maximum of 3 hats get discounted - if the allocation_limit is 3. Empty (null) allocation_limit means unlimited number of allocations.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'UpdatePriceRule' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing price rule code',
            'data'          => [ 'root_key' => 'price_rule' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'allocation_method' => [
                    'description' => 'Price rule allocation method',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'each', 'across' ],
                    'required'    => false
                ],
                'customer_selection' => [
                    'description' => 'Price rule customer selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'all', 'prerequisite' ],
                    'required'    => false
                ],
                'target_selection' => [
                    'description' => 'Price rule target selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'all', 'entitled' ],
                    'required'    => false
                ],
                'target_type' => [
                    'description' => 'Price rule target type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'line_item', 'shipping_line' ],
                    'required'    => false
                ],
                'title' => [
                    'description' => 'Price rule title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'value' => [
                    'description' => 'Price rule value',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'value_type' => [
                    'description' => 'Price rule value type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'fixed_amount', 'percentage' ],
                    'required'    => false
                ],
                'starts_at' => [
                    'description' => 'Price rule starts at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ends_at' => [
                    'description' => 'Price rule ends at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'entitled_country_ids' => [
                    'description' => 'A list of IDs of shipping countries that will be entitled to the discount. It can be used only with target_type set to shipping_line and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'entitled_product_ids' => [
                    'description' => 'A list of IDs of products that will be entitled to the discount. It can be used only with target_type set to line_item and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'entitled_variant_ids' => [
                    'description' => 'A list of IDs of product variants that will be entitled to the discount. It can be used only with target_type set to line_item and target_selection set to entitled.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'once_per_customer' => [
                    'description' => 'Whether the generated discount code will be valid only for a single use per customer. This is tracked using customer ID.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'prerequisite_customer_ids' => [
                    'description' => 'A list of customer IDs. For the price rule to be applicable, the customer must match one of the specified customers.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_quantity_range' => [
                    'description' => 'The minimum number of items for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_saved_search_ids' => [
                    'description' => 'A list of customer saved search IDs. For the price rule to be applicable, the customer must be in the group of customers matching a customer saved search.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_shipping_price_range' => [
                    'description' => 'The maximum shipping price for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_subtotal_range' => [
                    'description' => 'The minimum subtotal for the price rule to be applicable.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_to_entitlement_purchase' => [
                    'description' => 'The prerequisite purchase for a Buy X Get Y discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'usage_limit' => [
                    'description' => 'The maximum number of times the price rule can be used, per discount code.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'prerequisite_product_ids' => [
                    'description' => 'List of product ids that will be a prerequisites for a Buy X Get Y type discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_variant_ids' => [
                    'description' => 'List of variant ids that will be a prerequisites for a Buy X Get Y type discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_collection_ids' => [
                    'description' => 'List of collection ids that will be a prerequisites for a Buy X Get Y discount.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'prerequisite_to_entitlement_quantity_ratio' => [
                    'description' => 'Buy/Get ratio for a Buy X Get Y discount. prerequisite_quantity defines the necessary \'buy\' quantity and entitled_quantity the offered \'get\' quantity.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'allocation_limit' => [
                    'description' => 'The number of times the discount can be allocated on the cart - if eligible. For example a Buy 1 hat Get 1 hat for free discount can be applied 3 times on a cart having more than 6 hats, where maximum of 3 hats get discounted - if the allocation_limit is 3. Empty (null) allocation_limit means unlimited number of allocations.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'GetPriceRules' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of price rules',
            'data'          => [ 'root_key' => 'price_rules' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Count price rules created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Count price rules created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Count price rules last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Count price rules last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'starts_at_min' => [
                    'description' => 'Count price rules last starting after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'starts_at_max' => [
                    'description' => 'Count price rules last starting before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ends_at_min' => [
                    'description' => 'Count price rules last ending after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'ends_at_max' => [
                    'description' => 'Count price rules last ending before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'times_used' => [
                    'description' => 'Show price rules with times used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'GetPriceRule' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific price rule',
            'data'          => [ 'root_key' => 'price_rule' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CountPriceRules' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/images/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of images for a given product',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeletePriceRule' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing price rule',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Product
         * https://shopify.dev/api/admin/rest/reference/products/product
         * ---------------------------------------------------------------------------------------------
         */
        'GetProducts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of products',
            'data'          => [ 'root_key' => 'products' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Return only products specified by a comma-separated list of product IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'Return up to this many results per page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Return only products after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'title' => [
                    'description' => 'Return products by product title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'vendor' => [
                    'description' => 'Return products by product vendor.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Return only products specified by a comma-separated list of product handles.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'product_type' => [
                    'description' => 'Return products by product type.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'Return only products specified by a comma-separated list of statuses.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'collection_id' => [
                    'description' => 'Return products by product collection ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Return products created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Return products created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Return products last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Return products last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Return products published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Return products published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'presentment_currencies' => [
                    'description' => 'Return presentment prices in only certain currencies, specified by a comma-separated list of ISO 4217 currency codes.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountProducts' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of products',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'vendor' => [
                    'description' => 'Return products by product vendor.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'collection_id' => [
                    'description' => 'Return products by product collection ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Return products created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Return products created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Return products last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Return products last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Return products published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Return products published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Retrieve results based on their published status',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ]
            ]
        ],

        'GetProduct' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific product',
            'data'          => [ 'root_key' => 'product' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateProduct' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/products.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new product',
            'data'          => [ 'root_key' => 'product' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Product title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'body_html' => [
                    'description' => 'A description of the product. Supports HTML formatting.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A unique human-friendly string for the product. Automatically generated from the product\'s title. Used by the Liquid templating language to refer to objects.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'images' => [
                    'description' => 'A list of product image objects, each one representing an image associated with the product.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'options' => [
                    'description' => 'The custom product properties. For example, Size, Color, and Material. Each product can have up to 3 options and each option value can be up to 255 characters. Product variants are made of up combinations of option values. Options cannot be created without values. To create new options, a variant with an associated option value also needs to be created.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'product_type' => [
                    'description' => 'A categorization for the product used for filtering and searching products.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the product was published. Can be set to null to unpublish the product from the Online Store channel.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'The status of the product.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'active', 'archived', 'draft' ],
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A string of comma-separated tags that are used for filtering and search. A product can have up to 250 tags. Each tag can have up to 255 characters.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template used for the product page. If this property is specified, then the product page uses a template called "product.suffix.liquid", where "suffix" is the value of this property. If this property is "" or null, then the product page uses the default template "product.liquid"..',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'variants' => [
                    'description' => 'An array of product variants, each representing a different version of the product.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'vendor' => [
                    'description' => 'The name of the product\'s vendor.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateProduct' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/products/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing product',
            'data'          => [ 'root_key' => 'product' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Product title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'A description of the product. Supports HTML formatting.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A unique human-friendly string for the product. Automatically generated from the product\'s title. Used by the Liquid templating language to refer to objects.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'images' => [
                    'description' => 'A list of product image objects, each one representing an image associated with the product.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'options' => [
                    'description' => 'The custom product properties. For example, Size, Color, and Material. Each product can have up to 3 options and each option value can be up to 255 characters. Product variants are made of up combinations of option values. Options cannot be created without values. To create new options, a variant with an associated option value also needs to be created.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'product_type' => [
                    'description' => 'A categorization for the product used for filtering and searching products.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the product was published. Can be set to null to unpublish the product from the Online Store channel.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'The status of the product.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'active', 'archived', 'draft' ],
                    'required'    => false
                ],
                'tags' => [
                    'description' => 'A string of comma-separated tags that are used for filtering and search. A product can have up to 250 tags. Each tag can have up to 255 characters.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template used for the product page. If this property is specified, then the product page uses a template called "product.suffix.liquid", where "suffix" is the value of this property. If this property is "" or null, then the product page uses the default template "product.liquid"..',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'variants' => [
                    'description' => 'An array of product variants, each representing a different version of the product.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'vendor' => [
                    'description' => 'The name of the product\'s vendor.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteProduct' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/products/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing product',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Product Image
         * https://shopify.dev/api/admin/rest/reference/products/product-image
         * ---------------------------------------------------------------------------------------------
         */
        'GetProductImages' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/images.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of product images',
            'data'          => [ 'root_key' => 'images' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountProductImages' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/images/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of images for a given product',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'GetProductImage' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific product image',
            'data'          => [ 'root_key' => 'image' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CreateProductImage' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/products/{product_id}/images.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new product image',
            'data'          => [ 'root_key' => 'image' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'position' => [
                    'description' => 'The order of the product image in the list. The first product image is at position 1 and is the "main" image for the product.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'variant_ids' => [
                    'description' => 'An array of variant ids associated with the image.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'src' => [
                    'description' => 'Specifies the location of the product image. This parameter supports URL filters that you can use to retrieve modified copies of the image. For example, add _small, to the filename to retrieve a scaled copy of the image at 100 x 100 px (for example, ipod-nano_small.png), or add _2048x2048 to retrieve a copy of the image constrained at 2048 x 2048 px resolution (for example, ipod-nano_2048x2048.png).',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'attachment' => [
                    'description' => 'An image provided as raw data.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'filename' => [
                    'description' => 'Name for the provided attachment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'alt' => [
                    'description' => 'Alt text for the image.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'width' => [
                    'description' => 'Width dimension of the image which is determined on upload.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'height' => [
                    'description' => 'Height dimension of the image which is determined on upload.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateProductImage' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing product image',
            'data'          => [ 'root_key' => 'image' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'position' => [
                    'description' => 'The order of the product image in the list. The first product image is at position 1 and is the "main" image for the product.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'variant_ids' => [
                    'description' => 'An array of variant ids associated with the image.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'src' => [
                    'description' => 'Specifies the location of the product image. This parameter supports URL filters that you can use to retrieve modified copies of the image. For example, add _small, to the filename to retrieve a scaled copy of the image at 100 x 100 px (for example, ipod-nano_small.png), or add _2048x2048 to retrieve a copy of the image constrained at 2048 x 2048 px resolution (for example, ipod-nano_2048x2048.png).',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'attachment' => [
                    'description' => 'An image provided as raw data.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'filename' => [
                    'description' => 'Name for the provided attachment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'alt' => [
                    'description' => 'Alt text for the image.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'width' => [
                    'description' => 'Width dimension of the image which is determined on upload.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'height' => [
                    'description' => 'Height dimension of the image which is determined on upload.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteProductImage' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing product image',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Product ResourceFeedback
         * https://shopify.dev/api/admin/rest/reference/sales-channels/productresourcefeedback
         * ---------------------------------------------------------------------------------------------
         */
        'CreateProductResourceFeedback' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/products/{product_id}/resource_feedback.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create product feedback.',
            'data'          => [ 'root_key' => 'resource_feedback' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Create feedback for a specific product, using its product id.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'resource_type' => [
                    'description' => 'Type of resource for which feedback is returned. eg. Shop, Product.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'state' => [
                    'description' => 'Indicates the state that the Shop or resource is in, from the perspective of your app.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'requires_action', 'success' ],
                    'required'    => false
                ],
                'messages' => [
                    'description' => 'A concise set of copy strings to be displayed to merchants, to guide them in resolving problems your app encounters when trying to make use of their Shop and its resources. Required only when state is requires_action. Disallowed when state is success. Content restrictions for product feedback: four messages up to 100 characters long.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'feedback_generated_at' => [
                    'description' => 'The time at which the payload is constructed. Used to help determine whether incoming feedback is outdated compared to feedback already received, and if it should be ignored upon arrival.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'resource_updated_at' => [
                    'description' => 'The forwarded updated_at timestamp of the product. Used only for versioned resources, where the updated_at timestamp changes based on merchant actions. When required, it is used along with feedback_generated_at to help determine whether incoming feedback is outdated compared to feedback already received, and if it should be ignored upon arrival.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],

        'GetProductResourceFeedbacks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/resource_feedback.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve all product feedback from your app associated with the product.',
            'data'          => [ 'root_key' => 'resource_feedback' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Retrieve feedback for a specific product, by product id.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Product Variant
         * https://shopify.dev/api/admin/rest/reference/products/product-variant
         * ---------------------------------------------------------------------------------------------
         */
        'GetProductVariants' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Get all variants for the given product',
            'data'          => [ 'root_key' => 'variants' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'Return up to this many results per page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'presentment_currencies' => [
                    'description' => 'Return presentment prices in only certain currencies, specified by a comma-separated list of ISO 4217 currency codes.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountProductVariants' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of variants for a given product',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetProductVariant' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/variants/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific variant',
            'data'          => [ 'root_key' => 'variant' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CreateProductVariant' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new variant',
            'data'          => [ 'root_key' => 'variant' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'barcode' => [
                    'description' => 'The barcode, UPC, or ISBN number for the product.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'compare_at_price' => [
                    'description' => 'The original price of the item before an adjustment or a sale.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'fulfillment_service' => [
                    'description' => 'The fulfillment service associated with the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'grams' => [
                    'description' => 'The weight of the product variant in grams.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'image_id' => [
                    'description' => 'The unique numeric identifier for a product\'s image. The image must be associated to the same product as the variant.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'inventory_item_id' => [
                    'description' => 'The unique identifier for the inventory item, which is used in the Inventory API to query for inventory information.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'inventory_management' => [
                    'description' => 'The fulfillment service that tracks the number of items in stock for the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'inventory_policy' => [
                    'description' => 'Whether customers are allowed to place an order for the product variant when it\'s out of stock.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'deny', 'continue' ],
                    'required'    => false
                ],
                'option1' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'option2' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'option3' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'price' => [
                    'description' => 'The price of the product variant.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'sku' => [
                    'description' => 'A unique identifier for the product variant in the shop.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'taxable' => [
                    'description' => 'Whether a tax is charged when the product variant is sold.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_code' => [
                    'description' => 'This parameter applies only to the stores that have the Avalara AvaTax app installed. Specifies the Avalara tax code for the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'weight' => [
                    'description' => 'The weight of the product variant in the unit system specified with weight_unit.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'weight_unit' => [
                    'description' => 'The unit of measurement that applies to the product variant\'s weight. If you don\'t specify a value for weight_unit, then the shop\'s default unit of measurement is applied.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'g', 'kg', 'oz', 'lb' ],
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateProductVariant' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/variants/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing variant',
            'data'          => [ 'root_key' => 'variant' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'barcode' => [
                    'description' => 'The barcode, UPC, or ISBN number for the product.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'compare_at_price' => [
                    'description' => 'The original price of the item before an adjustment or a sale.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'fulfillment_service' => [
                    'description' => 'The fulfillment service associated with the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'grams' => [
                    'description' => 'The weight of the product variant in grams.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'image_id' => [
                    'description' => 'The unique numeric identifier for a product\'s image. The image must be associated to the same product as the variant.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'inventory_item_id' => [
                    'description' => 'The unique identifier for the inventory item, which is used in the Inventory API to query for inventory information.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'inventory_management' => [
                    'description' => 'The fulfillment service that tracks the number of items in stock for the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'inventory_policy' => [
                    'description' => 'Whether customers are allowed to place an order for the product variant when it\'s out of stock.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'deny', 'continue' ],
                    'required'    => false
                ],
                'option1' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'option2' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'option3' => [
                    'description' => 'The custom properties that a shop owner uses to define product variants.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'price' => [
                    'description' => 'The price of the product variant.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'sku' => [
                    'description' => 'A unique identifier for the product variant in the shop.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'taxable' => [
                    'description' => 'Whether a tax is charged when the product variant is sold.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'tax_code' => [
                    'description' => 'This parameter applies only to the stores that have the Avalara AvaTax app installed. Specifies the Avalara tax code for the product variant.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'weight' => [
                    'description' => 'The weight of the product variant in the unit system specified with weight_unit.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'weight_unit' => [
                    'description' => 'The unit of measurement that applies to the product variant\'s weight. If you don\'t specify a value for weight_unit, then the shop\'s default unit of measurement is applied.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'g', 'kg', 'oz', 'lb' ],
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteProductVariant' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/products/{product_id}/variants/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing variant for the given product',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ProductListing
         * https://shopify.dev/api/admin/rest/reference/sales-channels/productlisting
         * ---------------------------------------------------------------------------------------------
         */
        'GetProductListings' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/product_listings.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve product listings that are published to your app',
            'data'          => [ 'root_key' => 'product_listings' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_ids' => [
                    'description' => 'A comma-separated list of product ids',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 1000,
                    'required'    => false
                ],
                'collection_id' => [
                    'description' => 'Filter by products belonging to a particular collection',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Filter by product listings last updated after a certain date and time (formatted in ISO 8601)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Filter by product handle',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetProductListingIds' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/product_listings/product_ids.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve product_ids that are published to your app',
            'data'          => [ 'root_key' => 'product_ids' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 1000,
                    'required'    => false
                ]
            ]
        ],

        'CountProductListings' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/product_listings/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a count of products that are published to your app',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetProductListing' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/product_listings/{product_id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific product listing that is published to your app',
            'data'          => [ 'root_key' => 'product_listing' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CreateProductListing' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/product_listings/{product_id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a product listing to publish a product to your app',
            'data'          => [ 'root_key' => 'product_listing' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteProductListing' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/product_listings/{product_id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a product listing to unpublish a product from your app',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Province
         * https://shopify.dev/api/admin/rest/reference/store-properties/province
         * ---------------------------------------------------------------------------------------------
         */
        'GetProvinces' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries/{country_id}/provinces.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of provinces for a country',
            'data'          => [ 'root_key' => 'provinces' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'country_id' => [
                    'description' => 'The ID for the country that the province belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountProvinces' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries/{country_id}/provinces/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of provinces for a country',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'country_id' => [
                    'description' => 'The ID for the country that the province belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetProvince' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/countries/{country_id}/provinces/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single province for a countryp',
            'data'          => [ 'root_key' => 'province' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'country_id' => [
                    'description' => 'The ID for the country that the province belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateProvince' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/countries/{country_id}/provinces/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates an existing province for a country',
            'data'          => [ 'root_key' => 'province' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'country_id' => [
                    'description' => 'The ID for the country that the province belongs to.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The full name of the province.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shipping_zone_id' => [
                    'description' => 'The ID for the shipping zone that the province belongs to.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'tax' => [
                    'description' => 'The sales tax rate to be applied to orders made by customers from this province.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'tax_type' => [
                    'description' => 'The tax type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'null', 'normal', 'harmonized', 'compounded' ],
                    'required'    => false
                ],
                'tax_percentage' => [
                    'description' => 'The province\'s tax in percent format.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * RecurringApplicationCharge
         * https://shopify.dev/api/admin/rest/reference/billing/recurringapplicationcharge
         * ---------------------------------------------------------------------------------------------
         */
        'CreateRecurringApplicationCharge' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/recurring_application_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new recurring application charge',
            'data'          => [ 'root_key' => 'recurring_application_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Plan name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'capped_amount' => [
                    'description' => 'The limit a customer can be charged for usage based billing. If this property is provided, then you must also provide the terms property.',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'return_url' => [
                    'description' => 'URL where Shopify must return once the charge has been accepted',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'terms' => [
                    'description' => 'The terms and conditions of usage based billing charges. Must be present in order to create usage charges, for example when the capped_amount property is provided. Presented to the merchant when they approve an app\'s usage charges.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'test' => [
                    'description' => 'Whether the application charge is a test transaction. Valid values: true, null.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'trial_days' => [
                    'description' => 'The number of days that the customer is eligible for a free trial.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'GetRecurringApplicationCharge' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single recurring application charge',
            'data'          => [ 'root_key' => 'recurring_application_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific recurring application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetRecurringApplicationCharges' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/recurring_application_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of recurring application charges',
            'data'          => [ 'root_key' => 'recurring_application_charges' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'DeleteRecurringApplicationCharge' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Cancels a recurring application charge',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific recurring application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateRecurringApplicationCharge' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{id}/customize.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates the capped amount of an active recurring application charge',
            'data'          => [ 'root_key' => 'recurring_application_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'capped_amount' => [
                    'description' => 'Set the capped amount of an active recurring application charge',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'sentAs'      => 'recurring_application_charge[capped_amount]',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Redirect
         * https://shopify.dev/api/admin/rest/reference/online-store/redirect
         * ---------------------------------------------------------------------------------------------
         */
        'GetRedirects' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/redirects.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of redirects',
            'data'          => [ 'root_key' => 'redirects' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'path' => [
                    'description' => 'Show redirects with a given path.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'target' => [
                    'description' => 'Show redirects with a given target.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountRedirects' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/redirects/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of redirects',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'path' => [
                    'description' => 'Count redirects with a given path.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'target' => [
                    'description' => 'Count redirects with a given target.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetRedirect' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/redirects/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific redirect',
            'data'          => [ 'root_key' => 'redirect' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Redirect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateRedirect' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/redirects.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a redirect',
            'data'          => [ 'root_key' => 'redirect' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'path' => [
                    'description' => 'Path URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'target' => [
                    'description' => 'Target URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'UpdateRedirect' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/redirects/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing redirect',
            'data'          => [ 'root_key' => 'redirect' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'path' => [
                    'description' => 'Path URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'target' => [
                    'description' => 'Target URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteRedirect' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/redirects/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing redirect',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Redirect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Refund
         * https://shopify.dev/api/admin/rest/reference/orders/refund
         * ---------------------------------------------------------------------------------------------
         */
        'GetRefunds' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/refunds.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of Refunds for an Order',
            'data'          => [ 'root_key' => 'refunds' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'in_shop_currency' => [
                    'description' => 'Show amounts in the shop currency for the underlying transaction.',
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'GetRefund' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/refunds/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific refund',
            'data'          => [ 'root_key' => 'refund' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific refund ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'in_shop_currency' => [
                    'description' => 'Show amounts in the shop currency for the underlying transaction.',
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'CalculateRefund' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/refunds/calculate.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Calculate refund transactions based on line items and shipping',
            'data'          => [ 'root_key' => 'refund' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'shipping' => [
                    'description' => 'Specify how much shipping to refund.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'refund_line_items' => [
                    'description' => 'A list of line item IDs, quantities to refund, and restock instructions.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three-letter code (ISO 4217 format) for the currency used for the refund. Note: Required whenever the shipping amount property is provided.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'CreateRefund' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/refunds.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a Refund for an existing Order',
            'data'          => [ 'root_key' => 'refund' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'notify' => [
                    'description' => 'Whether to send a refund notification to the customer.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'note' => [
                    'description' => 'An optional note attached to a refund.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'discrepancy_reason' => [
                    'description' => 'An optional comment that explains a discrepancy between calculated and actual refund amounts. Used to populate the reason property of the resulting order adjustment object attached to the refund.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'restock', 'damage', 'customer', 'other' ],
                    'required'    => false
                ],
                'shipping' => [
                    'description' => 'Specify how much shipping to refund.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'refund_duties' => [
                    'description' => 'A list of refunded duties.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'refund_line_items' => [
                    'description' => 'A list of line item IDs, quantities to refund, and restock instructions.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'transactions' => [
                    'description' => 'A list of transactions to process as refunds.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three-letter code (ISO 4217 format) for the currency used for the refund. Note: Required whenever the shipping amount property is provided.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Report
         * https://shopify.dev/api/admin/rest/reference/analytics/report
         * ---------------------------------------------------------------------------------------------
         */
        'GetReports' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/reports.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of reports',
            'data'          => [ 'root_key' => 'reports' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'A comma-separated list of report IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The amount of results to return.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show reports last updated after date. (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show reports last updated before date. (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetReport' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/reports/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single report created by your app',
            'data'          => [ 'root_key' => 'report' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'ID of the report',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateReport' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/reports.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new report',
            'data'          => [ 'root_key' => 'report' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The name of the report.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => true
                ],
                'shopify_ql' => [
                    'description' => 'The ShopifyQL the report will query',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'UpdateReport' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/reports/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates a report',
            'data'          => [ 'root_key' => 'report' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'ID of the report',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
               'name' => [
                    'description' => 'The name of the report.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => false
                ],
                'shopify_ql' => [
                    'description' => 'The ShopifyQL the report will query',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'DeleteReport' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/reports/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Deletes a report',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'ID of the report',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ResourceFeedback
         * https://shopify.dev/api/admin/rest/reference/sales-channels/resourcefeedback
         * ---------------------------------------------------------------------------------------------
         */
        'CreateResourceFeedback' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/resource_feedback.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a new ResourceFeedback',
            'data'          => [ 'root_key' => 'resource_feedback' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'state' => [
                    'description' => 'Indicates the state that the Shop or resource is in, from the perspective of your app.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'requires_action', 'success' ],
                    'required'    => true
                ],
                'feedback_generated_at' => [
                    'description' => 'The time at which the payload is constructed. Used to help determine whether incoming feedback is outdated compared to feedback already received, and if it should be ignored upon arrival. Type: ISO 8601 UTC datetime as string with year, month [or week], day, hour, minute, second, millisecond, and time zone.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ],
                'messages' => [
                    'description' => 'A concise set of copy strings to be displayed to merchants, to guide them in resolving problems your app encounters when trying to make use of their Shop and its resources. Required only when state is requires_action. Disallowed when state is success.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetResourceFeedbacks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/resource_feedback.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all ResourceFeedbacks',
            'data'          => [ 'root_key' => 'resource_feedback' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ScriptTag
         * https://shopify.dev/api/admin/rest/reference/online-store/scripttag
         * ---------------------------------------------------------------------------------------------
         */
        'GetScriptTags' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/script_tags.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all script tags',
            'data'          => [ 'root_key' => 'script_tags' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The number of results to return.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Show script tags created after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Show script tags created before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show script tags last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show script tags last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'src' => [
                    'description' => 'Show script tags with this URL.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountScriptTags' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/script_tags/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of all script tags',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'src' => [
                    'description' => 'Count only script tags with a given URL.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetScriptTag' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a single script tag',
            'data'          => [ 'root_key' => 'script_tag' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to retrieve',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateScriptTag' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/script_tags.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new script tags',
            'data'          => [ 'root_key' => 'script_tag' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'event' => [
                    'description' => 'Event value when the script tag is loaded',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'onload' ],
                    'required'    => true
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'display_scope' => [
                    'description' => 'The page or pages on the online store where the script should be included.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'online_store', 'order_status', 'all' ],
                    'required'    => false
                ],
                'cache' => [
                    'description' => 'Whether the Shopify CDN can cache and serve the script tag.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'UpdateScriptTag' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing script tag',
            'data'          => [ 'root_key' => 'script_tag' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to update',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'event' => [
                    'description' => 'Event value when the script tag is loaded',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'onload' ],
                    'required'    => false
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'display_scope' => [
                    'description' => 'The page or pages on the online store where the script should be included.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'online_store', 'order_status', 'all' ],
                    'required'    => false
                ],
                'cache' => [
                    'description' => 'Whether the Shopify CDN can cache and serve the script tag.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'DeleteScriptTag' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing script tag',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to delete',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * ShippingZone
         * https://shopify.dev/api/admin/rest/reference/store-properties/shippingzone
         * ---------------------------------------------------------------------------------------------
         */
        'GetShippingZones' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shipping_zones.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of all shipping zones',
            'data'          => [ 'root_key' => 'shipping_zones' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Shop
         * https://shopify.dev/api/admin/rest/reference/store-properties/shop
         * ---------------------------------------------------------------------------------------------
         */
        'GetShop' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shop.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves the shop\'s configuration',
            'data'          => [ 'root_key' => 'shop' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * SmartCollection
         * https://shopify.dev/api/admin/rest/reference/products/smartcollection
         * ---------------------------------------------------------------------------------------------
         */
        'GetSmartCollections' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/smart_collections.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of smart collections',
            'data'          => [ 'root_key' => 'smart_collections' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'ids' => [
                    'description' => 'Show only the smart collections specified by a comma-separated list of IDs.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'title' => [
                    'description' => 'Show smart collections with the specified title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'product_id' => [
                    'description' => 'Show smart collections that includes the specified product.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'Filter results by smart collection handle.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show smart collections last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show smart collections last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show smart collections published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show smart collections published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Filter results based on the published status of smart collections.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CountSmartCollections' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/smart_collections/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of smart collections',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Show smart collections with the specified title.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'product_id' => [
                    'description' => 'Show smart collections that includes the specified product.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Show smart collections last updated after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Show smart collections last updated before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_min' => [
                    'description' => 'Show smart collections published after date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_at_max' => [
                    'description' => 'Show smart collections published before date (format: 2014-04-25T16:15:47-04:00)',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_status' => [
                    'description' => 'Filter results based on the published status of smart collections.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [ 'published', 'unpublished', 'any' ],
                    'required'    => false
                ]
            ]
        ],

        'GetSmartCollection' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve specific smart collection',
            'data'          => [ 'root_key' => 'smart_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateSmartCollection' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/smart_collections.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a smart collection',
            'data'          => [ 'root_key' => 'smart_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Smart collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'rules' => [
                    'description' => 'The list of rules that define what products go into the smart collection.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'body_html' => [
                    'description' => 'The description of the smart collection. Includes HTML markup. Many shop themes display this on the smart collection page.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the smart collection. Automatically generated from the title. Used in shop themes by the Liquid templating language to refer to the smart collection.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => false
                ],
                'image' => [
                    'description' => 'The image associated with the smart collection.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the smart collection is visible.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) that the smart collection was published. Returns null when the collection is hidden.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_scope' => [
                    'description' => 'Whether the smart collection is published to the Point of Sale channel.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'web', 'global' ],
                    'required'    => false
                ],
                'disjunctive' => [
                    'description' => 'Whether the product must match all the rules to be included in the smart collection.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'sort_order' => [
                    'description' => 'The order of the products in the smart collection.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'alpha-asc', 'alpha-desc', 'best-selling', 'created', 'created-desc', 'manual', 'price-asc', 'price-desc' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template that the shop uses. By default, the original template is called product.liquid, and additional templates are called product.suffix.liquid.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateSmartCollection' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update a smart collection',
            'data'          => [ 'root_key' => 'smart_collection' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Smart collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'rules' => [
                    'description' => 'The list of rules that define what products go into the smart collection.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'body_html' => [
                    'description' => 'The description of the smart collection. Includes HTML markup. Many shop themes display this on the smart collection page.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'handle' => [
                    'description' => 'A human-friendly unique string for the smart collection. Automatically generated from the title. Used in shop themes by the Liquid templating language to refer to the smart collection.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'maxLength'   => 255,
                    'required'    => false
                ],
                'image' => [
                    'description' => 'The image associated with the smart collection.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'published' => [
                    'description' => 'Whether the smart collection is visible.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'published_at' => [
                    'description' => 'The date and time (ISO 8601 format) that the smart collection was published. Returns null when the collection is hidden.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'published_scope' => [
                    'description' => 'Whether the smart collection is published to the Point of Sale channel.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'web', 'global' ],
                    'required'    => false
                ],
                'disjunctive' => [
                    'description' => 'Whether the product must match all the rules to be included in the smart collection.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'sort_order' => [
                    'description' => 'The order of the products in the smart collection.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'alpha-asc', 'alpha-desc', 'best-selling', 'created', 'created-desc', 'manual', 'price-asc', 'price-desc' ],
                    'required'    => false
                ],
                'template_suffix' => [
                    'description' => 'The suffix of the Liquid template that the shop uses. By default, the original template is called product.liquid, and additional templates are called product.suffix.liquid.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'metafields' => [
                    'description' => 'The Metafield resource allows you to add additional information to other Admin API resources',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateSmartCollectionProductOrdering' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/smart_collections/{id}/order.json.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Updates the ordering type of products in a smart collection',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_ids' => [
                    'description' => 'An array of product IDs, in the order that you want them to appear at the top of the collection. When products is specified but empty, any previously sorted products are cleared.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'sentAs'      => 'products[]',
                    'required'    => true
                ],
                'sort_order' => [
                    'description' => 'The order in which products in the custom collection appear.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'alpha-asc', 'alpha-desc', 'best-selling', 'created', 'created-desc', 'manual', 'price-asc', 'price-desc' ],
                    'required'    => false
                ]
            ]
        ],

        'DeleteSmartCollection' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete a smart collection',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * StorefrontAccessToken
         * https://shopify.dev/api/admin/rest/reference/access/storefrontaccesstoken
         * ---------------------------------------------------------------------------------------------
         */
        'CreateStorefrontAccessToken' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/storefront_access_tokens.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new storefront token',
            'data'          => [ 'root_key' => 'storefront_access_token' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'An arbitrary title for each token determined by the developer/application, used for reference purposes.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'DeleteStorefrontAccessToken' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/storefront_access_tokens/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing storefront access token',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'StorefrontAccessToken ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetStorefrontAccessTokens' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/storefront_access_tokens.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of storefront access tokens',
            'data'          => [ 'root_key' => 'storefront_access_tokens' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * TenderTransaction
         * https://shopify.dev/api/admin/rest/reference/tendertransaction
         * ---------------------------------------------------------------------------------------------
         */
        'GetTenderTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/tender_transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of tender transactions',
            'data'          => [ 'root_key' => 'storefront_access_tokens' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Retrieve only transactions after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'processed_at_min' => [
                    'description' => 'Show tender transactions processed_at or after the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at_max' => [
                    'description' => 'Show tender transactions processed_at or before the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'processed_at' => [
                    'description' => 'Show tender transactions processed at the specified date.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'order' => [
                    'description' => 'Show tender transactions ordered by processed_at in ascending or descending order.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Theme
         * https://shopify.dev/api/admin/rest/reference/online-store/theme
         * ---------------------------------------------------------------------------------------------
         */
        'GetThemes' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/themes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of themes',
            'data'          => [ 'root_key' => 'themes' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetTheme' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/themes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific theme',
            'data'          => [ 'root_key' => 'theme' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateTheme' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/themes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a theme by providing the public URL of a ZIP file that contains the theme.',
            'data'          => [ 'root_key' => 'theme' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Name of the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'src' => [
                    'description' => 'Zip source for the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'role' => [
                    'description' => 'Specifies how the theme is being used within the shop.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'main', 'unpublished', 'demo' ],
                    'required'    => false
                ]
            ]
        ],

        'UpdateTheme' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/themes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing theme',
            'data'          => [ 'root_key' => 'theme' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific theme ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Name of the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'src' => [
                    'description' => 'Zip source for the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'role' => [
                    'description' => 'Specifies how the theme is being used within the shop.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'main', 'unpublished', 'demo' ],
                    'required'    => false
                ]
            ]
        ],

        'DeleteTheme' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/themes/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing theme',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific theme ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Transaction
         * https://shopify.dev/api/admin/rest/reference/orders/transaction
         * ---------------------------------------------------------------------------------------------
         */
        'GetTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of transactions.',
            'data'          => [ 'root_key' => 'transactions' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'since_id' => [
                    'description' => 'Retrieve only transactions after the specified ID.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specifed by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'in_shop_currency' => [
                    'description' => 'Show amounts in the shop currency.',
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'CountTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of an order\'s transactions.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to count transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetTransaction' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a specific transaction.',
            'data'          => [ 'root_key' => 'transaction' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Transaction ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specifed by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'in_shop_currency' => [
                    'description' => 'Show amounts in the shop currency.',
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'CreateTransaction' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new transaction for a given order',
            'data'          => [ 'root_key' => 'transaction' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'kind' => [
                    'description' => 'The transaction\'s type.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'authorization', 'capture', 'sale', 'void', 'refund' ],
                    'required'    => true
                ],
                'amount' => [
                    'description' => 'The amount of money included in the transaction. If you don\'t provide a value for `amount`, then it defaults to the total cost of the order (even if a previous transaction has been made towards it).',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => false
                ],
                'authorization' => [
                    'description' => 'The authorization code associated with the transaction.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'authorization_expires_at' => [
                    'description' => 'The date and time (ISO 8601 format) when the Shopify Payments authorization expires.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'currency' => [
                    'description' => 'The three-letter code (ISO 4217 format) for the currency used for the payment.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'extended_authorization_attributes' => [
                    'description' => 'The attributes associated with a Shopify Payments extended authorization period.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'gateway' => [
                    'description' => 'The name of the gateway the transaction was issued through.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'shopify_payments',
                        'paypal',
                        'stripe',
                        'authorize_net',
                        'afterpay_north_america',
                        'afterpay',
                        'gift_card',
                        'amazon_payments',
                        'buy_now_pay_later_with_klarna',
                        'maksa_myöhemmin_klarna',
                        'pilko_maksut_klarna',
                        'få_först_betala_sen_klarna',
                        'få_først_betal_senere_klarna',
                        'checkout_finland',
                        'sezzle',
                        'payplug',
                        'braintree',
                        'sequrapart_payment',
                        'vipps',
                        'quadpay',
                        'omisepayment_credit_debit_cards_',
                        'Banküberweisung',
                        'Cash on Delivery (COD)'
                    ],
                    'required'    => false
                ],
                'parent_id' => [
                    'description' => 'The ID of an associated transaction.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'processed_at' => [
                    'description' => 'The date and time (ISO 8601 format) when a transaction was processed. This value is the date that\'s used in the analytic reports. By default, it matches the created_at value. If you\'re importing transactions from an app or another platform, then you can set processed_at to a date and time in the past to match when the original transaction was processed.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'status' => [
                    'description' => 'The status of the transaction.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'pending', 'failure', 'success', 'error' ],
                    'required'    => false
                ],
                'test' => [
                    'description' => 'Whether the transaction is a test transaction.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'user_id' => [
                    'description' => 'The ID for the user who was logged into the Shopify POS device when the order was processed, if applicable.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'currency_exchange_adjustment' => [
                    'description' => 'An adjustment on the transaction showing the amount lost or gained due to fluctuations in the currency exchange rate.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'source' => [
                    'description' => 'The origin of the transaction. Set to external to create a cash transaction for the associated order.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'external' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * UsageCharge
         * https://shopify.dev/api/admin/rest/reference/billing/usagecharge
         * ---------------------------------------------------------------------------------------------
         */
        'CreateUsageCharge' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Creates a usage charge',
            'data'          => [ 'root_key' => 'usage_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Usage charge description',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ]
            ]
        ],

        'GetUsageCharge' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific usage charge',
            'data'          => [ 'root_key' => 'usage_charge' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific usage charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'GetUsageCharges' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of usage charges for the given recurring application charges',
            'data'          => [ 'root_key' => 'usage_charges' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * User
         * https://shopify.dev/api/admin/rest/reference/plus/user
         * ---------------------------------------------------------------------------------------------
         */
        'GetUsers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/users.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a list of all users',
            'data'          => [ 'root_key' => 'users' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'limit' => [
                    'description' => 'The maximum number of results to retrieve.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ]
            ]
        ],

        'GetUser' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/users/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single user',
            'data'          => [ 'root_key' => 'user' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The ID of the user\'s staff.',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetCurrentUser' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/users/current.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves information about the user account associated with the access token used to make this API request. This request works only when the access token was created for a specific user of the shop.',
            'data'          => [ 'root_key' => 'user' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Webhook
         * https://shopify.dev/api/admin/rest/reference/events/webhook
         * ---------------------------------------------------------------------------------------------
         */
        'GetWebhooks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/webhooks.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of webhooks',
            'data'          => [ 'root_key' => 'webhooks' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'Retrieve webhook subscriptions that send the POST request to this URI.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'created_at_min' => [
                    'description' => 'Retrieve webhook subscriptions that were created after a given date and time (format: 2014-04-25T16:15:47-04:00).',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'created_at_max' => [
                    'description' => 'Retrieve webhook subscriptions that were created before a given date and time (format: 2014-04-25T16:15:47-04:00).',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Comma-separated list of the properties you want returned for each item in the result list. Use this parameter to restrict the returned list of items to only those properties you specify.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'Maximum number of webhook subscriptions that should be returned.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'minimum'     => 1,
                    'maximum'     => 250,
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict the returned list to webhook subscriptions whose id is greater than the specified since_id.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false
                ],
                'topic' => [
                    'description' => 'Show webhook subscriptions with a given topic.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'app/uninstalled',
                        'carts/create',
                        'carts/update',
                        'checkouts/create',
                        'checkouts/delete',
                        'checkouts/update',
                        'collection_listings/add',
                        'collection_listings/remove',
                        'collection_listings/update',
                        'collections/create',
                        'collections/delete',
                        'collections/update',
                        'customer_groups/create',
                        'customer_groups/delete',
                        'customer_groups/update',
                        'customer_payment_methods/create',
                        'customer_payment_methods/revoke',
                        'customer_payment_methods/update',
                        'customers/create',
                        'customers/delete',
                        'customers/disable',
                        'customers/enable',
                        'customers/update',
                        'disputes/create',
                        'disputes/update',
                        'domains/create',
                        'domains/destroy',
                        'domains/update',
                        'draft_orders/create',
                        'draft_orders/delete',
                        'draft_orders/update',
                        'fulfillment_events/create',
                        'fulfillment_events/delete',
                        'fulfillments/create',
                        'fulfillments/update',
                        'inventory_items/create',
                        'inventory_items/delete',
                        'inventory_items/update',
                        'inventory_levels/connect',
                        'inventory_levels/disconnect',
                        'inventory_levels/update',
                        'locales/create',
                        'locales/update',
                        'locations/create',
                        'locations/delete',
                        'locations/update',
                        'order_transactions/create',
                        'orders/cancelled',
                        'orders/create',
                        'orders/delete',
                        'orders/edited',
                        'orders/fulfilled',
                        'orders/paid',
                        'orders/partially_fulfilled',
                        'orders/updated',
                        'product_listings/add',
                        'product_listings/remove',
                        'product_listings/update',
                        'products/create',
                        'products/delete',
                        'products/update',
                        'profiles/create',
                        'profiles/delete',
                        'profiles/update',
                        'refunds/create',
                        'selling_plan_groups/create',
                        'selling_plan_groups/delete',
                        'selling_plan_groups/update',
                        'shop/update',
                        'subscription_billing_attempts/failure',
                        'subscription_billing_attempts/success',
                        'subscription_contracts/create',
                        'subscription_contracts/update',
                        'tender_transactions/create',
                        'themes/create',
                        'themes/delete',
                        'themes/publish',
                        'themes/update'
                    ],
                    'required'    => false
                ],
                'updated_at_min' => [
                    'description' => 'Retrieve webhooks that were updated before a given date and time (format: 2014-04-25T16:15:47-04:00).',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ],
                'updated_at_max' => [
                    'description' => 'Retrieve webhooks that were updated after a given date and time (format: 2014-04-25T16:15:47-04:00).',
                    'location'    => 'query',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => false
                ]
            ]
        ],

        'CountWebhooks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/webhooks/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a count of existing webhook subscriptions.',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'Retrieve webhook subscriptions that send the POST request to this URI.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'topic' => [
                    'description' => 'Show webhook subscriptions with a given topic.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'enum'        => [
                        'app/uninstalled',
                        'carts/create',
                        'carts/update',
                        'checkouts/create',
                        'checkouts/delete',
                        'checkouts/update',
                        'collection_listings/add',
                        'collection_listings/remove',
                        'collection_listings/update',
                        'collections/create',
                        'collections/delete',
                        'collections/update',
                        'customer_groups/create',
                        'customer_groups/delete',
                        'customer_groups/update',
                        'customer_payment_methods/create',
                        'customer_payment_methods/revoke',
                        'customer_payment_methods/update',
                        'customers/create',
                        'customers/delete',
                        'customers/disable',
                        'customers/enable',
                        'customers/update',
                        'disputes/create',
                        'disputes/update',
                        'domains/create',
                        'domains/destroy',
                        'domains/update',
                        'draft_orders/create',
                        'draft_orders/delete',
                        'draft_orders/update',
                        'fulfillment_events/create',
                        'fulfillment_events/delete',
                        'fulfillments/create',
                        'fulfillments/update',
                        'inventory_items/create',
                        'inventory_items/delete',
                        'inventory_items/update',
                        'inventory_levels/connect',
                        'inventory_levels/disconnect',
                        'inventory_levels/update',
                        'locales/create',
                        'locales/update',
                        'locations/create',
                        'locations/delete',
                        'locations/update',
                        'order_transactions/create',
                        'orders/cancelled',
                        'orders/create',
                        'orders/delete',
                        'orders/edited',
                        'orders/fulfilled',
                        'orders/paid',
                        'orders/partially_fulfilled',
                        'orders/updated',
                        'product_listings/add',
                        'product_listings/remove',
                        'product_listings/update',
                        'products/create',
                        'products/delete',
                        'products/update',
                        'profiles/create',
                        'profiles/delete',
                        'profiles/update',
                        'refunds/create',
                        'selling_plan_groups/create',
                        'selling_plan_groups/delete',
                        'selling_plan_groups/update',
                        'shop/update',
                        'subscription_billing_attempts/failure',
                        'subscription_billing_attempts/success',
                        'subscription_contracts/create',
                        'subscription_contracts/update',
                        'tender_transactions/create',
                        'themes/create',
                        'themes/delete',
                        'themes/publish',
                        'themes/update'
                    ],
                    'required'    => false
                ]
            ]
        ],

        'GetWebhook' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific webhook',
            'data'          => [ 'root_key' => 'webhook' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Comma-separated list of the properties you want returned for each item in the result list. Use this parameter to restrict the returned list of items to only those properties you specify.',
                    'location'    => 'query',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ]
            ]
        ],

        'CreateWebhook' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/webhooks.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new webhook',
            'data'          => [ 'root_key' => 'webhook' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'Webhook subscriptions that send the POST request to this URI.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'topic' => [
                    'description' => 'Use this parameter to select the data format for the payload.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'app/uninstalled',
                        'carts/create',
                        'carts/update',
                        'checkouts/create',
                        'checkouts/delete',
                        'checkouts/update',
                        'collection_listings/add',
                        'collection_listings/remove',
                        'collection_listings/update',
                        'collections/create',
                        'collections/delete',
                        'collections/update',
                        'customer_groups/create',
                        'customer_groups/delete',
                        'customer_groups/update',
                        'customer_payment_methods/create',
                        'customer_payment_methods/revoke',
                        'customer_payment_methods/update',
                        'customers/create',
                        'customers/delete',
                        'customers/disable',
                        'customers/enable',
                        'customers/update',
                        'disputes/create',
                        'disputes/update',
                        'domains/create',
                        'domains/destroy',
                        'domains/update',
                        'draft_orders/create',
                        'draft_orders/delete',
                        'draft_orders/update',
                        'fulfillment_events/create',
                        'fulfillment_events/delete',
                        'fulfillments/create',
                        'fulfillments/update',
                        'inventory_items/create',
                        'inventory_items/delete',
                        'inventory_items/update',
                        'inventory_levels/connect',
                        'inventory_levels/disconnect',
                        'inventory_levels/update',
                        'locales/create',
                        'locales/update',
                        'locations/create',
                        'locations/delete',
                        'locations/update',
                        'order_transactions/create',
                        'orders/cancelled',
                        'orders/create',
                        'orders/delete',
                        'orders/edited',
                        'orders/fulfilled',
                        'orders/paid',
                        'orders/partially_fulfilled',
                        'orders/updated',
                        'product_listings/add',
                        'product_listings/remove',
                        'product_listings/update',
                        'products/create',
                        'products/delete',
                        'products/update',
                        'profiles/create',
                        'profiles/delete',
                        'profiles/update',
                        'refunds/create',
                        'selling_plan_groups/create',
                        'selling_plan_groups/delete',
                        'selling_plan_groups/update',
                        'shop/update',
                        'subscription_billing_attempts/failure',
                        'subscription_billing_attempts/success',
                        'subscription_contracts/create',
                        'subscription_contracts/update',
                        'tender_transactions/create',
                        'themes/create',
                        'themes/delete',
                        'themes/publish',
                        'themes/update'
                    ],
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Optional array of fields that should be included in the webhook subscription.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'format' => [
                    'description' => 'Use this parameter to select the data format for the payload.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'JSON', 'XML' ],
                    'required'    => false
                ],
                'metafield_namespaces' => [
                    'description' => 'Optional array of namespaces for any metafields that should be included with each webhook.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'private_metafield_namespaces' => [
                    'description' => 'Optional array of namespaces for any private metafields that should be included with each webhook.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UpdateWebhook' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Update an existing webhook',
            'data'          => [ 'root_key' => 'webhook' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'Webhook subscriptions that send the POST request to this URI.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'topic' => [
                    'description' => 'Use this parameter to select the data format for the payload.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [
                        'app/uninstalled',
                        'carts/create',
                        'carts/update',
                        'checkouts/create',
                        'checkouts/delete',
                        'checkouts/update',
                        'collection_listings/add',
                        'collection_listings/remove',
                        'collection_listings/update',
                        'collections/create',
                        'collections/delete',
                        'collections/update',
                        'customer_groups/create',
                        'customer_groups/delete',
                        'customer_groups/update',
                        'customer_payment_methods/create',
                        'customer_payment_methods/revoke',
                        'customer_payment_methods/update',
                        'customers/create',
                        'customers/delete',
                        'customers/disable',
                        'customers/enable',
                        'customers/update',
                        'disputes/create',
                        'disputes/update',
                        'domains/create',
                        'domains/destroy',
                        'domains/update',
                        'draft_orders/create',
                        'draft_orders/delete',
                        'draft_orders/update',
                        'fulfillment_events/create',
                        'fulfillment_events/delete',
                        'fulfillments/create',
                        'fulfillments/update',
                        'inventory_items/create',
                        'inventory_items/delete',
                        'inventory_items/update',
                        'inventory_levels/connect',
                        'inventory_levels/disconnect',
                        'inventory_levels/update',
                        'locales/create',
                        'locales/update',
                        'locations/create',
                        'locations/delete',
                        'locations/update',
                        'order_transactions/create',
                        'orders/cancelled',
                        'orders/create',
                        'orders/delete',
                        'orders/edited',
                        'orders/fulfilled',
                        'orders/paid',
                        'orders/partially_fulfilled',
                        'orders/updated',
                        'product_listings/add',
                        'product_listings/remove',
                        'product_listings/update',
                        'products/create',
                        'products/delete',
                        'products/update',
                        'profiles/create',
                        'profiles/delete',
                        'profiles/update',
                        'refunds/create',
                        'selling_plan_groups/create',
                        'selling_plan_groups/delete',
                        'selling_plan_groups/update',
                        'shop/update',
                        'subscription_billing_attempts/failure',
                        'subscription_billing_attempts/success',
                        'subscription_contracts/create',
                        'subscription_contracts/update',
                        'tender_transactions/create',
                        'themes/create',
                        'themes/delete',
                        'themes/publish',
                        'themes/update'
                    ],
                    'required'    => true
                ],
                'fields' => [
                    'description' => 'Optional array of fields that should be included in the webhook subscription.',
                    'location'    => 'json',
                    'type'        => [ 'string', 'array' ],
                    'filters'     => [ '\CbzShopify\Util::implodeIfArray' ],
                    'required'    => false
                ],
                'format' => [
                    'description' => 'Use this parameter to select the data format for the payload.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'enum'        => [ 'JSON', 'XML' ],
                    'required'    => false
                ],
                'metafield_namespaces' => [
                    'description' => 'Optional array of namespaces for any metafields that should be included with each webhook.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'private_metafield_namespaces' => [
                    'description' => 'Optional array of namespaces for any private metafields that should be included with each webhook.',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteWebhook' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete an existing webhook',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],


        /**
         * ---------------------------------------------------------------------------------------------
         * Other Methods
         * ---------------------------------------------------------------------------------------------
         */
        'CreateDelegateAccessToken' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/access_tokens/delegate.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new delegate access token',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'delegate_access_scope' => [
                    'description' => 'The list of scopes that will be delegated to the new access token',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'expires_in' => [
                    'description' => 'The amount of time, in seconds, after which the delegate access token is no longer valid.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],
    ],


    /**
     * ~~~~~~~~~~~~~~~~~~~~~~~~
     *          Models
     * ~~~~~~~~~~~~~~~~~~~~~~~~
     */
    'models' => [
        'GenericModel' => [
            'type'       => 'object',
            'properties' => [
                'pagination' => [
                    'location' => 'header',
                    'sentAs'   => 'Link',
                    'type'     => 'string'
                ]
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ],
        'RedirectModel' => [
            'type'       => 'object',
            'properties' => [
                'redirect_history' => [
                    'location' => 'header',
                    'sentAs'   => 'X-Guzzle-Redirect-History',
                    'type'     => 'array'
                ],
                'redirect_status_history' => [
                    'location' => 'header',
                    'sentAs'   => 'X-Guzzle-Redirect-Status-History',
                    'type'     => 'array'
                ]
            ]
        ]
    ]
];