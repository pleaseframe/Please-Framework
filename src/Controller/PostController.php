<?php

namespace App\Controller;

use App\Entity\Post;
use App\Services\FileUploader;
use App\Services\Notif;
use App\Form\PostType;
use App\Repository\PostRepository;
// use Http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param PostRepository $postRepository
     * @return Response
     */
    public function index(PostRepository $postRepository, Notif $notif)
    {

    	$posts = $postRepository->findAll();

    	// dump($posts);

        // return $this->render('post/index.html.twig', [
        //     'controller_name' => 'PostController',
        // ]);
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return Response
     * @var UploadedFile $file
     */
    public function create(Request $request, FileUploader $fileUploader){
    	// create a new post with title
    	$post = new Post();

    	// $post->setTitle('This is going to be a title');

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        // $form->getErrors();

        if($form->isSubmitted()){
    	   $em = $this->getDoctrine()->getManager();
           // $file = $form['imagedata']->getData();
           $file = $request->files->get('post')['imagedata'];
           // dump($file);
           // die;
           /** @var UploadedFile $file */
           if($file){
                
               $filename = $fileUploader->uploadFile($file);

               $post->setImage($filename);
        	   $em->persist($post);
        	   $em->flush();
           }
            $this->addFlash('success','Your Post was CREATED !');
            return $this->redirect($this->generateUrl('post.index'));
        }

        

    	// return a response 
    	// return new Response('POST was created');
        return $this->render('post/create.html.twig',[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/show/{id}", name="show")
     * @param Post $post
     * @return Response
     */
    public function show(Post $post){

        // $post = $postRepository->findPostWithCategory($id);

        // dump($post);die;
        // $post = $post->find($id);
        // dump($post); die;
        return $this->render('post/show.html.twig',[
            'post' => $post
        ]);
    } 

    // ++++ CUSTOM QUERY +++++
    // public function show($id, PostRepository $postRepository){

    //     $post = $postRepository->findPostWithCategory($id);

    //     dump($post);die;
    //     // $post = $post->find($id);
    //     // dump($post); die;
    //     return $this->render('post/show.html.twig',[
    //         'post' => $post
    //     ]);
    // }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function remove(Post $post){

        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success','Your Post was REMOVED !');
        return $this->redirect($this->generateUrl('post.index'));

    }


}
