<?php
// src/Cituao/CoordBundle/Form/Type/CronogramaType.php
namespace Cituao\PracticanteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CronogramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	    
        ->add('apellidos','text', array('label' => 'Apellidos', 'read_only'=>'true'))
		->add('nombres','text', array('label' => 'Nombres','read_only'=>'true'))
		
		
		
		//->add('ci','text', array('label' => 'Cedula de Identidad','read_only'=>'true'))
		//->add('codigo','text', array('label' => 'Codigo' , 'read_only'=>'true'))		
		//->add('modalidad','choice', array('label' => 'Modalidad', 'choices'=> array('aud'=>'Audio', 'vis'=>'Visual', 'imp'=>'Impreso'),'multiple'=>true))
		//->add('tipo','choice', array('label' => 'Tipo', 'choices'=> array('nac'=>'Nacional', 'int'=>'Internacional')))
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Practicante'
        ));
    }

    public function getName()
    {
        return 'hojadevida';
    }
}
