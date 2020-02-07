<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Hotel;
use App\Entity\Location;
use App\Repository\HotelRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class BookingController extends AbstractController
{
    /**
     * @Route("/Hotels", name="Hotels")
     */
    public function index(HotelRepository $repo)
    {
       // get all the hotels
        $hotel=$repo->findAll();
        return $this->render('Hotels.html.twig', [
            'controller_name' => 'BlogController',
            'hotels'=>$hotel
        ]);
    }
    /**
     * @Route("/Hotelshow/{id}", name="your_hotel")
     */
    public function show(Hotel $hotel,Request $request, EntityManagerInterface $manager)
    {
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime())
                    ->setFiles($file);
            $manager->persist($comment);
            $manager->flush();
            return $this->redirectToRoute('blog_show',['id'=> $file->getId()]);
        }
        return $this->render('blog/show.html.twig', [
            'controller_name' => 'BlogController',
            'files'=>$file,
            'ratingform'=>$form->createView()
        ]);
    }
     /**
     * @Route("/Hotelform", name="Hotelform")
     * @Route("/Hotelform/{id}", name="edit")
     */
    public function form(Hotel $hotel=null,Location $location=null,Request $request, EntityManagerInterface $manager)
    {
        // check if there is no hotel uploaded
        if(!$hotel){
            $hotel=new Hotel();
            $location=new Location();
        }

        $formhotel=$this->createFormBuilder($hotel)
                    ->add('name', TextType::class,[ 
                        'attr'=>
                        [ 'placeholder' =>"Hotel name" ]])  
                    ->add('image', TextType::class,[ 
                            'attr'=>
                            [ 'placeholder' =>"Image URL" ]])
                    ->add('price',TextType::class,[
                        'attr'=>
                            [ 'placeholder' =>"Price" ]])
                    ->getForm();
             $formlocation=$this->createFormBuilder($location)                
                     ->add('City',TextType::class,[
                                'attr'=>
                                    [ 'placeholder' =>"City" ]])
                    ->add('Country', TextType::class,[ 
                            'attr'=>
                            [ 'placeholder' =>"Country" ]])
                    ->add('Address',TextareaType::class,[
                        'attr'=>
                            [ 'placeholder' =>"Address" ]])
                    ->add('ZipCode',TextType::class,[
                                'attr'=>
                                    [ 'placeholder' =>"ZipCode" ]])
                    ->add('save', SubmitType::class, ['label' => 'Submit'])
                    ->getForm();
        $formhotel->handleRequest($request);
        $formlocation->handleRequest($request);
        if($formhotel->isSubmitted() && $formhotel->isValid()){
            /* if there is a date
            if(!$hotel->getId()){
                $hotel->setCreatedAT(new \DateTime());
            }*/
            $manager->persist($hotel);
            $manager->flush();
            return $this->redirectToRoute('Hotelshow',['id'=> $hotel->getId()]);
        }
        return $this->render('NewHotel.html.twig',[
            'formhotel'=>$formhotel->createView(),
            'formlocation'=>$formlocation->createView(),
            'editmode'=>$hotel->getId()!==0
        ]);
    }
    
}
