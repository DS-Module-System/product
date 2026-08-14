<?php

namespace App\Form\Product;

use App\Entity\Product\Product;
use App\Enum\Product\ProductMeasure;
use App\Form\Core\DefaultForm\EditForm;
use App\Service\Core\DomainTranslationService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductForm extends EditForm
{
    public function __construct(
        private readonly DomainTranslationService $domainTranslationService
    ) 
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', TextType::class, [
                'label' => 'name',
                'constraints' => [
                    new Length([
                        'max' => 255,
                    ]),
                    new NotBlank(),
                ],
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
                'required' => false,
                'attr' => [
                    'rows' => 4,
                ],
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
                'constraints' => [
                    new NotBlank(),
                ],
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'translation_domain' => 'product',
        ]);
    }
} 