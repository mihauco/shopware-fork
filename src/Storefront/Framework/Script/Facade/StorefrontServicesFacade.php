<?php declare(strict_types=1);

namespace Shopware\Storefront\Framework\Script\Facade;

use Shopware\Core\Checkout\Cart\Exception\CustomerNotLoggedInException;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\ScriptController;
use Symfony\Component\HttpFoundation\Response;

/**
 * The `storefront` service allows you render a twig template and to ensure that the current customer is logged in.
 *
 * @script-service custom_endpoint
 */
class StorefrontServicesFacade
{
    private ScriptController $scriptController;

    public function __construct(ScriptController $scriptController)
    {
        $this->scriptController = $scriptController;
    }

    /**
     * The `render()` method allows you to render a twig view with the parameters you provide.
     *
     * @param string $view The name of the twig template you want to render e.g. `@Storefront/storefront/page/content/detail.html.twig`
     * @param array $parameters The parameters you want to pass to the template, ensure that you pass the `page` parameter from the hook to the templates.
     *
     * @return Response The `Response` with the rendered template as the content.
     *
     * @example storefront-render/script.twig 3 Fetch a product, add it to the page and return a rendered response.
     */
    public function render(string $view, array $parameters = []): Response
    {
        return $this->scriptController->renderStorefront($view, $parameters);
    }
}
