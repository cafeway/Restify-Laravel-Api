<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use OpenApi\Annotations as OA;

 /**
      * @OA\Info(
        * title="My first laravel api",
        *version = "1.0"
      *)
      */
class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */

    /**
 * @OA\Get(
 *     path="/api/products",
 *     summary="Get a list of all products",
 *     tags={"Products"},
 *     @OA\Response(response=200, description="Successful operation"),
 *     @OA\Response(response=400, description="Invalid request")
 * )
 */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
 * @OA\Post(
 *     path="/api/products",
 *     tags={"Products"},
 *     summary="Create a new product",
 *     description="Create a new product with the provided data",
 *     operationId="createProduct",
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         description="Name of the product",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *          name="price",
 *          in="query",
 *          description="price of the product",
 *          required=true,
 *          @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *          name="description",
 *          in="query",
 *          description="Description of the product",
 *          required=true,
 *          @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="price", type="number"),
 *             @OA\Property(property="description", type="string"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="price", type="number"),

 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error or other client-side error",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string")
 *         )
 *     )
 * )
 */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       /**
 * @OA\Get(
 *     path="/api/products/{id}",
 *     summary="Get a product by ID",
 *     tags={"Products"},
 *     description="Retrieve a product based on its ID",
 *     operationId="getProductById",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the product",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="name", type="string"),
 *
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string")
 *         )
 *     )
 * )
 */
     public function show($id)
    {
        //get the product by id
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateToken (Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return  $token->plainTextToken;
    }
}
