<?php
/**
 * @Author: jad
 * @Date:   2017-05-04 10:57:17
 * @Last Modified by:   jad
 * @Last Modified time: 2017-05-05 18:46:42
 */

namespace Acme\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Request;

/**
* 
*/
class ActivitiesController extends FOSRestController
{

	protected $entityManager;
	protected $activitiesRepository;
	protected $tagsRepository;
	protected $categoriesRepository;

	function getRepositories()
	{
		if (!isset($this->entityManager)) {
			$this->entityManager = $this->getDoctrine()->getManager();
		}
		if (!isset($this->activitiesRepository)) {
			$this->activitiesRepository = $this->entityManager->getRepository('AcmeApiBundle:Activity');
		}
		if (!isset($this->tagsRepository)) {
			$this->tagsRepository = $this->entityManager->getRepository('AcmeApiBundle:tags');
		}
		if (!isset($this->categoriesRepository)) {
			$this->categoriesRepository = $this->entityManager->getRepository('AcmeApiBundle:Category');
		}
	}
	
	/**
	 * @Get("/home/activities")
	 */
	function getHomeActivitiesAction()
	{
		$this->getRepositories();

        $tags = $this->tagsRepository->findBy(array("homePage" => 1), array('id' => 'DESC'), 10);
        $categories = $this->categoriesRepository->findBy(array("published" => 1), array('classement' => 'ASC'), 6);
        foreach ($categories as $category) {
            $nbActs = $this->activitiesRepository->nbActsByCat($category->getId());
            $category->nbActs = $nbActs;
        }

        $activities = $this->activitiesRepository->findBy(array(
            "published" => 1, "popular" => 1), array('id' => 'DESC'), 8);
        $d = array();
        foreach ($activities as $activity) {
        	array_push($d, $activity->getName());
        }

        $weekends = $this->activitiesRepository->findBy(
        	array(
        		"published" => 1,
        		"event" => 1
        	), array(
        		'id' => 'DESC'
        	), 4);
		$data = array("activities" => $d, "weekends" => $weekends);
		$view = $this->view($data);
		return $this->handleView($view);
	}

	function getUserAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		$view = $this->view($user);
		return $this->handleView($view);
	}

	/**
	 * @Post("/activity/create/")
	 */
	public function newActivityAction(Request $request)
	{
		$this->getRepositories();
		$data = $request->request->all();
	}


}

?>