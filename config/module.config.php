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

use Zend\ServiceManager\Factory\InvokableFactory;
use CbzShopify\Container\ShopifyClientFactory;
use CbzShopify\Container\TokenExchangerFactory;
use CbzShopify\OAuth\TokenExchanger;
use CbzShopify\ShopifyClient;
use CbzShopify\ShopifyGraphQLClient;
use CbzShopify\Validator\RequestValidator;
use CbzShopify\Validator\WebhookValidator;

return [
    'dependencies' => [
        'factories' => [
            RequestValidator::class     => InvokableFactory::class,
            WebhookValidator::class     => InvokableFactory::class,
            ShopifyClient::class        => ShopifyClientFactory::class,
            ShopifyGraphQLClient::class => ShopifyGraphQLClient::class,
            TokenExchanger::class       => TokenExchangerFactory::class,
        ],
    ],
];
