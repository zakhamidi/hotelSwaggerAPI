<?php

namespace App\Controller;

use OpenApi\Annotations as OA;

/** 
 * @author  Zakaria Hamidi <mr.zakaria.hamidi@gmail.com>
 * 
 */ 
// Class Generate Json code
// OA/Items(ref="#/components/schemas/Hotel") to get entities 
//JsonContent for Json code

class ApiController
{
    /**
     * @OA\Get(
     *     path="/hotels",
     *     @OA\Response(
     *          response="200",
     *          description="Show all hotels",
     *          @OA\JsonContent(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Hotel")
     *              )
     *      )
     * )
     */

    public function index(){
        
    }

    // get hotel by ID

    /**
     * @OA\Get(
     *     path="/hotels/{hotelID}",
     *     summary="Find hotel by ID",
     *     description="Returns a single hotel",
     *     operationId="getHotelById",
     *     tags={"hotel"},
     *     @OA\Parameter(
     *         description="ID of hotel to return",
     *         in="path",
     *         name="hotelId",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Hotel")
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Hotel not found"
     *     ),
     * )
     */
    public function show(){
        
    }
    /**
     * @OA\Post(
     *     path="/hotels",
     *     tags={"hotel"},
     *     operationId="addhotel",
     *     summary="Add a new hotel",
     *     description="Add a mew hotel",
     *     @OA\RequestBody(
     *         description="hotel object that needs to be added",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Hotel"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     ),
     *     security={
     *     }
     * )
     */
    public function addHotel(){
    }
     /**
     * @OA\Put(
     *     path="/hotels",
     *     tags={"hotel"},
     *     operationId="updatehotel",
     *     summary="Update an existing hotel",
     *     description="",
     *     @OA\RequestBody(
     *         required=true,
     *         description="hotel object that needs to be added",
     *         @OA\JsonContent(ref="#/components/schemas/Hotel"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Hotel not found",
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception",
     *     ),
     *     security={
     *       }
     *     }
     * )
     */
    public function updatehotel(){
    }
    /**
     * @OA\Delete(
     *     path="/hotels/{hotelId}",
     *     summary="Deletes a hotel",
     *     description="Deletes a hotel",
     *     operationId="deletehotel",
     *     tags={"hotel"},
     *     @OA\Parameter(
     *         description="hotel id to delete",
     *         in="path",
     *         name="hotelId",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Header(
     *         header="api_key",
     *         description="Api key header",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="hotel not found"
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function deletehotel(){
    }

}