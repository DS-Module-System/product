<?php

namespace App\Form\Product;

use App\Enum\Product\ProductMeasure;
use App\Form\Core\DefaultForm\SearchForm;
use App\Service\Core\DomainTranslationService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductSearchForm extends SearchForm
{

    public function __construct(
        private readonly DomainTranslationService $domainTranslationService
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', TextType::class, [
                'label' => 'name',
                'required' => false,
            ])
            ->add('measure', ChoiceType::class, [
                'label' => 'measure',
                'choices' => [
                    $this->domainTranslationService->translate('product.measure.kg') => ProductMeasure::KG,
                    $this->domainTranslationService->translate('product.measure.liter') => ProductMeasure::LITER,
                    $this->domainTranslationService->translate('product.measure.piece') => ProductMeasure::PIECE,
                    $this->domainTranslationService->translate('product.measure.squareMeter') => ProductMeasure::SQUARE_METER,
                    $this->domainTranslationService->translate('product.measure.cubicMeter') => ProductMeasure::CUBIC_METER,
                ],
                'required' => false,
                'placeholder' => $this->domainTranslationService->translate('product.measure.all'),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'translation_domain' => 'product',
        ]);
    }
} 