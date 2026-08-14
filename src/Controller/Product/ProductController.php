<?php

namespace App\Controller\Product;

use App\Controller\Core\CoreBaseController;
use App\Entity\Product\Product;
use App\Form\Product\ProductForm;
use App\Form\Product\ProductSearchForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(path: '/products', name: 'product_')]
class ProductController extends CoreBaseController
{
    protected string $entityClass = Product::class;
    protected string $formClass = ProductForm::class;
    protected string $searchFormClass = ProductSearchForm::class;
    protected string $moduleTemplateName = 'product';

    #[Route(path: '', name: 'list')]
    #[IsGranted('ROLE_PRODUCT_VIEW')]
    public function list(Request $request): Response
    {
        $page = $request->get('page', 1);
        return $this->baseList($request, $page);
    }

    #[Route(path: '/create', name: 'create')]
    #[IsGranted('ROLE_PRODUCT_CREATE')]
    public function create(Request $request): Response
    {
        return $this->baseCreate($request);
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    #[IsGranted('ROLE_PRODUCT_EDIT')]
    public function edit($id, Request $request): Response
    {
        return $this->baseEdit($request, $id);
    }

    #[Route(path: '/deletes', name: 'deletes')]
    #[IsGranted('ROLE_PRODUCT_DELETE')]
    public function deletes(Request $request): Response
    {
        return $this->baseDeletes($request);
    }
} 