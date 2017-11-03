<?php
    namespace Lddt\MainBundle\Form;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    class CommentType extends AbstractType{
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder->add('content', TextareaType::class, ['label'=> 'votre commentaire']);
                    //->add('createdAt')
                    //->add('updatedAt')
                    //->add('draw')
                    //->add('critic');
        }
        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(array('data_class' => 'Lddt\MainBundle\Entity\Comment'));
        }
        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix(){
            return 'lddt_mainbundle_comment';
        }
    }
