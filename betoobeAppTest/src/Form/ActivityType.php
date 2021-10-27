<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom',
        ])
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                "label" => "Date de début d'activité",
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                "label" => "Date de fin d'activité", 
                'constraints' => [
                    new Callback(function ($object, ExecutionContextInterface $context) {
                        $start = $context->getRoot()->getData()['startDate'];
                        $stop = $object;

                        if (is_a($start, \DateTime::class) && is_a($stop, \DateTime::class)) {
                            if ($stop->format('U') - $start->format('U') < 0) {
                                $context
                                    ->buildViolation('La date d\'activité ne peut pas être avant le début ce dernier')
                                    ->addViolation();
                            }
                        }
                    }),
                ]])
            ->add('requiredAge', IntegerType::class)
            ->add('maxPeople', IntegerType::class)
            ->add('currentPeople', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'csrf_protection' => false,
        );
    }
}
