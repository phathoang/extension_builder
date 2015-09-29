<?php
namespace FIXTURE\TestExtension\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 John Doe <mail@typo3.com>, TYPO3
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * MainController
 */
class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * mainRepository
	 *
	 * @var \FIXTURE\TestExtension\Domain\Repository\MainRepository
	 * @inject
	 */
	protected $mainRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$mains = $this->mainRepository->findAll();
		$this->view->assign('mains', $mains);
	}

	/**
	 * action show
	 *
	 * @param \FIXTURE\TestExtension\Domain\Model\Main $main
	 * @return void
	 */
	public function showAction(\FIXTURE\TestExtension\Domain\Model\Main $main) {
		$this->view->assign('main', $main);
	}

	/**
	 * action new
	 *
	 * @return void
	 */
	public function newAction() {
		
	}

	/**
	 * action create
	 *
	 * @param \FIXTURE\TestExtension\Domain\Model\Main $newMain
	 * @return void
	 */
	public function createAction(\FIXTURE\TestExtension\Domain\Model\Main $newMain) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mainRepository->add($newMain);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \FIXTURE\TestExtension\Domain\Model\Main $main
	 * @ignorevalidation $main
	 * @return void
	 */
	public function editAction(\FIXTURE\TestExtension\Domain\Model\Main $main) {
		$this->view->assign('main', $main);
	}

	/**
	 * action update
	 *
	 * @param \FIXTURE\TestExtension\Domain\Model\Main $main
	 * @return void
	 */
	public function updateAction(\FIXTURE\TestExtension\Domain\Model\Main $main) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mainRepository->update($main);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \FIXTURE\TestExtension\Domain\Model\Main $main
	 * @return void
	 */
	public function deleteAction(\FIXTURE\TestExtension\Domain\Model\Main $main) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mainRepository->remove($main);
		$this->redirect('list');
	}

}