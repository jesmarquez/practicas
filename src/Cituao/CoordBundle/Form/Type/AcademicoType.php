<?php
// src/Cituao/AcademicoBundle/Form/Type/AcademicoType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('file')
		->add('ci','text', array('label' => 'Cédula de identidad:','required' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'required' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'required' => true))
        ->add('email', 'email',  array('label' => 'Email:',  'attr' => array('placeholder' => 'usuario@servidor'), 'required' => true ))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil:', 'required' => true))
		->add('telefonoFijo','text', array('label' => 'Teléfono fijo:'))
		->add('perfil','textarea', array('label' => 'Perfil', 'max_length' => '500' ,  'attr' => array('placeholder' => 'Ingrese el perfil del asesor', 'cols' => '5', 'rows' => '5')))
		->add('categoria', 'choice', array('label' => 'Categoría', 'choices'=> array('a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D')))	
		->add('declaracion', 'checkbox', array('label' => 'Declaración de Renta', 'required' => false));

		//->add('modalidad','choice', array('label' => 'Modalidad', 'choices'=> array('aud'=>'Audio', 'vis'=>'Visual', 'imp'=>'Impreso'),'multiple'=>true));*/
		//->add('tipo','choice', array('label' => 'Tipo', 'choices'=> array('nac'=>'Nacional', 'int'=>'Internacional')))

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Academico', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'academico';
    }
}
