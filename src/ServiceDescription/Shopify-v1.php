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
                    'min'         => 1,
                    'max'         => 250,
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
                    'min'         => 0.5,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
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
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
            'summary'       => 'Retrieve a list of assets for a given theme',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'min'         => 1,
                    'max'         => 1000,
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
                    'min'         => 1,
                    'max'         => 1000,
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
                ],
                'status' => [
                    'description' => 'Filter results by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'pending', 'published', 'unapproved' ]
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
                ],
                'status' => [
                    'description' => 'Filter results by their status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'pending', 'published', 'unapproved' ]
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'ids' => [
                    'description' => 'Show only collections specified by a comma-separated list of IDs.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'published', 'unpublished', 'any' ]
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show on a page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'min'         => 1,
                    'max'         => 250,
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
                    'required'    => false,
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ]
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ]
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ]
                ],
                'fields' => [
                    'description' => 'Retrieve only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'needs_response', 'under_review', 'charge_refunded', 'accepted', 'won', 'lost' ]
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'required'    => false,
                    'enum'        => [ 'open', 'invoice_sent', 'completed' ]
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'required'    => false,
                    'enum'        => [ 'open', 'invoice_sent', 'completed' ]
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'Show only certain fields, specified by a comma-separated list of field names.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
                    'required'    => false
                ],
                'location_ids' => [
                    'description' => 'Comma seperated list of location IDs',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'type'        => 'string',
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
                    'min'         => 3,
                    'max'         => 30,
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'A container for a set of metafields. You need to define a custom namespace for your metafields to distinguish them from the metafields used by other apps.',
                    'location'    => 'json',
                    'type'        => 'string',
                    'min'         => 2,
                    'max'         => 20,
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
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                    'type'        => 'string',
                    'required'    => false
                ],
                'limit' => [
                    'description' => 'The maximum number of results to show on a page.',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'min'         => 1,
                    'max'         => 250,
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
                    'required'    => false,
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ]
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ]
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ]
                ],
                'fields' => [
                    'description' => 'Retrieve only certain fields, specified by a comma-separated list of fields names.',
                    'location'    => 'query',
                    'type'        => 'string',
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'required'    => false,
                    'enum'        => [ 'open', 'closed', 'cancelled', 'any' ]
                ],
                'financial_status' => [
                    'description' => 'Filter orders by their financial status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'authorized', 'pending', 'paid', 'partially_paid', 'refunded', 'voided', 'partially_refunded', 'any', 'unpaid' ]
                ],
                'fulfillment_status' => [
                    'description' => 'Filter orders by their fulfillment status.',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => [ 'shipped', 'partial', 'unshipped', 'any', 'unfulfilled' ]
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                    'description' => 'The order line items',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Order Risk
         * https://shopify.dev/api/admin/rest/reference/orders/order-risk
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'GetPageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a page',
            'data'          => [ 'root_key' => 'metafields' ],
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
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                'body_html' => [
                    'description' => 'HTML content for the page',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Payment
         * https://shopify.dev/api/admin/rest/reference/sales-channels/payment
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Payout
         * https://shopify.dev/api/admin/rest/reference/shopify_payments/payout
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Policy
         * https://shopify.dev/api/admin/rest/reference/store-properties/policy
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * PriceRule
         * https://shopify.dev/api/admin/rest/reference/discounts/pricerule
         * ---------------------------------------------------------------------------------------------
         */
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

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
                'title' => [
                    'description' => 'Price rule title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'target_type' => [
                    'description' => 'Price rule target type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'line_item', 'shipping_line' ]
                ],
                'target_selection' => [
                    'description' => 'Price rule target selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'all', 'entitled' ]
                ],
                'value_type' => [
                    'description' => 'Price rule value type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'fixed_amount', 'percentage' ]
                ],
                'value' => [
                    'description' => 'Price rule value',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'allocation_method' => [
                    'description' => 'Price rule allocation method',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'each', 'across' ]
                ],
                'starts_at' => [
                    'description' => 'Price rule starts at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ],
                'customer_selection' => [
                    'description' => 'Price rule customer selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'all', 'prerequisite' ]
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'GetProductMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a product',
            'data'          => [ 'root_key' => 'metafields' ],
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
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
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


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Product ResourceFeedback
         * https://shopify.dev/api/admin/rest/reference/sales-channels/productresourcefeedback
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'GetProductVariantMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/variants/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a variant',
            'data'          => [ 'root_key' => 'metafields' ],
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * ProductListing
         * https://shopify.dev/api/admin/rest/reference/sales-channels/productlisting
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Province
         * https://shopify.dev/api/admin/rest/reference/store-properties/province
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * RecurringApplicationCharge
         * https://shopify.dev/api/admin/rest/reference/billing/recurringapplicationcharge
         * ---------------------------------------------------------------------------------------------
         */
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
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

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
                'return_url' => [
                    'description' => 'URL where Shopify must return once the charge has been accepted',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
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


        /**
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],


        /**
         * @method INCOMPLETE
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
                    'description' => 'Comma seperated list of IDs',
                    'location'    => 'query',
                    'type'        => 'string',
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
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false
                ],
                'fields' => [
                    'description' => 'A comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'since_id' => [
                    'description' => 'Restrict results to after the specified ID',
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'description' => 'The name of the report. Maximum length: 255 characters',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'shopify_ql' => [
                    'description' => 'The ShopifyQL the report will query',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                    'description' => 'The name of the report. Maximum length: 255 characters',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'shopify_ql' => [
                    'description' => 'The ShopifyQL the report will query',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],

        'DeleteReport' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/reports/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieves a single report created by your app',
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * ResourceFeedback
         * https://shopify.dev/api/admin/rest/reference/sales-channels/resourcefeedback
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * ScriptTag
         * https://shopify.dev/api/admin/rest/reference/online-store/scripttag
         * ---------------------------------------------------------------------------------------------
         */
        'GetScriptTags' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/script_tags.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of installed script tags',
            'data'          => [ 'root_key' => 'script_tags' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CountScriptTags' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/script_tags/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of script tags',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'required'    => true,
                    'enum'        => [ 'onload' ]
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                    'required'    => true,
                    'enum'        => [ 'onload' ]
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],


        /**
         * @method HAS METAFIELDS
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Shop
         * https://shopify.dev/api/admin/rest/reference/store-properties/shop
         * ---------------------------------------------------------------------------------------------
         */
        'GetShop' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/shop.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Get data about a single shop',
            'data'          => [ 'root_key' => 'shop' ],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],


        /**
         * @method HAS METAFIELDS
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * StorefrontAccessToken
         * https://shopify.dev/api/admin/rest/reference/access/storefrontaccesstoken
         * ---------------------------------------------------------------------------------------------
         */
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
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

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
                    'description' => 'StorefrontAccessToken title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * TenderTransaction
         * https://shopify.dev/api/admin/rest/reference/tendertransaction
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CreateTheme' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/themes.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new theme',
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * Transaction
         * https://shopify.dev/api/admin/rest/reference/online-store/transaction
         * ---------------------------------------------------------------------------------------------
         */
        'GetTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of transactions for a given order',
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CountTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of script tags',
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
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'GetTransaction' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific transaction',
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'description' => 'The kind of transaction',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'authorization', 'capture', 'sale', 'void', 'refund' ]
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
            ]
        ],


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * UsageCharge
         * https://shopify.dev/api/admin/rest/reference/billing/usagecharge
         * ---------------------------------------------------------------------------------------------
         */
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
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                    'type'        => 'string',
                    'required'    => false
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CreateUsageCharge' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new usage charge',
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


        /**
         * @method INCOMPLETE
         * ---------------------------------------------------------------------------------------------
         * User
         * https://shopify.dev/api/admin/rest/reference/plus/user
         * ---------------------------------------------------------------------------------------------
         */


        /**
         * @method INCOMPLETE
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
            ]
        ],

        'CountWebhooks' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/webhooks/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of webhooks',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'query'
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
                'format' => [
                    'description' => 'Type of data to return',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [ 'json', 'xml' ]
                ],
                'address' => [
                    'description' => 'Specific URL for the webhook',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'topic' => [
                    'description' => 'List of webhook topic',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [
                        'carts/create',
                        'carts/update',
                        'checkouts/create',
                        'checkouts/update',
                        'checkouts/delete',
                        'collections/create',
                        'collections/update',
                        'collections/delete',
                        'collection_listings/add',
                        'collection_listings/update',
                        'collection_listings/remove',
                        'customers/create',
                        'customers/disable',
                        'customers/enable',
                        'customers/update',
                        'customers/delete',
                        'customer_groups/create',
                        'customer_groups/update',
                        'customer_groups/delete',
                        'disputes/create',
                        'disputes/update',
                        'domains/create',
                        'domains/destroy',
                        'domains/update',
                        'draft_orders/create',
                        'draft_orders/update',
                        'draft_orders/delete',
                        'fulfillments/create',
                        'fulfillments/update',
                        'fulfillment_events/create',
                        'fulfillment_events/delete',
                        'inventory_items/create',
                        'inventory_items/update',
                        'inventory_items/delete',
                        'inventory_levels/connect',
                        'inventory_levels/disconnect',
                        'inventory_levels/update',
                        'locations/create',
                        'locations/update',
                        'locations/delete',
                        'orders/cancelled',
                        'orders/create',
                        'orders/fulfilled',
                        'orders/paid',
                        'orders/partially_fulfilled',
                        'orders/updated',
                        'orders/delete',
                        'orders/edited',
                        'order_transactions/create',
                        'products/create',
                        'products/update',
                        'products/delete',
                        'product_listings/add',
                        'product_listings/update',
                        'product_listings/remove',
                        'profiles/create',
                        'profiles/update',
                        'profiles/delete',
                        'refunds/create',
                        'app/uninstalled',
                        'shop/update',
                        'locales/create',
                        'locales/update',
                        'tender_transactions/create',
                        'themes/create',
                        'themes/publish',
                        'themes/update',
                        'themes/delete'
                    ]
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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
                ]
            ],
            'additionalParameters' => [
                'location' => 'json'
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