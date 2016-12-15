<?php
/**
 * Created by IntelliJ IDEA.
 * User: bdudelsack
 * Date: 09.12.16
 * Time: 08:50
 */

namespace App\Action;

use App\Guestbook\GuestbookEntry;
use App\Guestbook\GuestbookForm;
use App\Guestbook\GuestbookService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class IndexAction
{
    /** @var TemplateRendererInterface  */
    protected $templateRenderer;

    /** @var GuestbookService */
    protected $guestbookService;

    /** @var GuestbookForm */
    protected $guestbookForm;

    public function __construct(TemplateRendererInterface $renderer, GuestbookService $guestbookService, GuestbookForm $guestbookForm)
    {
        $this->templateRenderer = $renderer;
        $this->guestbookService = $guestbookService;
        $this->guestbookForm = $guestbookForm;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $entries = $this->guestbookService->fetchAll();

        if($request->getMethod() == 'POST') {
            $this->guestbookForm->setData($request->getParsedBody());

            if($this->guestbookForm->isValid()) {
                $content = $this->guestbookForm->get('content')->getValue();
                $name = $this->guestbookForm->get('name')->getValue();
                $email = $this->guestbookForm->get('email')->getValue();
                $entry = new GuestbookEntry(null, $content, $name, $email);

                $this->guestbookService->insert($entry);

                /* TODO: Get the correct redirect url via router */
                return new RedirectResponse('/');
            }
        }

        return new HtmlResponse($this->templateRenderer->render('app::index', [
            'form' => $this->guestbookForm,
            'entries' => $entries
        ]));
    }
}
