<?php

namespace eALPS\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class InfoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('id', 'integer');
		$builder->add('title', 'text');
		$builder->add('body', 'textarea');
		$builder->add('importance', 'choice', array(
			'choices' => $this -> getInportanceArray(),
		));
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
	
	function static getInportanceArray() {
		
		$importanceArray = array(
			'通 知' => '通知',
			'重 要' => '重要',
			'警 告' => '警告',
			'成 功' => '成功',
		);
		
		return $importanceArray;
	}
}