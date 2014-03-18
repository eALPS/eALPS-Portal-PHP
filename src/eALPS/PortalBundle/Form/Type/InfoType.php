<?php

namespace Acme\StoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class InfoType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('id', 'integer');
		$builder->add('title', 'text');
		$builder->add('body', 'textarea');
		$builder->add('importance', 'text');
		$builder->add('address', 'text');
		$builder->add('insertdate', 'datetime');
		$builder->add('updatedate', 'datetime');
		$builder->add('deletedate', 'datetime');
		$builder->add('term', 'datetime');
		$builder->add('availability');
	}

	public function getName()
	{
		return 'info';
	}
}