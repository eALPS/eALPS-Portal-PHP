<?php

namespace Acme\StoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class InfoType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('name');
		$builder->add('price', 'money', array('currency' => 'USD'));
	}

	public function getName()
	{
		return 'info';
	}
}