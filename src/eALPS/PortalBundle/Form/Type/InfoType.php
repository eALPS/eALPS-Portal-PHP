<?php

namespace eALPS\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class InfoType extends AbstractType
{
	
	public function getName()
	{
		return 'info';
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('id', 'integer');
		$builder->add('title', 'text');
		$builder->add('body', 'textarea');
		$builder->add('importance', 'choice', array(
			'choices' => $this -> getInportanceArray(),
			'empty_value' => '選択肢を選んで下さい',
			'required'  => false,
		));
		$builder->add('address', 'choice', array(
			'choices' => $this -> getAddressArray(),
			'empty_value' => '選択肢を選んで下さい',
			'required'  => false,
		));
		$builder->add('insertdate', 'datetime', array(
			'required'  => false,
		));
		$builder->add('updatedate', 'datetime', array(
			'required'  => false,
		));
		$builder->add('deletedate', 'datetime', array(
			'required'  => false,
		));
		$builder->add('term', 'datetime', array(
			'required'  => false,
		));
		$builder->add('availability');
	}
	
	function getInportanceArray()
	{
		return array(
			'通 知' => '通知',
			'重 要' => '重要',
			'警 告' => '警告',
			'成 功' => '成功',
		);
	}
	
	function getAddressArray()
	{
		return array(
			'全 体' => '全体',
			'教 員' => '教員',
			'学 生' => '学生',
			'共通教育' => '共通教育',
			'農学部' => '農学部',
			'教育学部' => '教育学部',
			'繊維学部' => '繊維学部',
			'経済学部' => '経済学部',
			'人文学部' => '人文学部',
			'医学部' => '医学部',
			'理学部' => '理学部',
			'工学部' => '工学部',
		);
	}
}