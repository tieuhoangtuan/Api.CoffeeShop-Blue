<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MyHttpResponse;
use App\Http\Requests\Coffee\CoffeeStoreRequest;
use App\Http\Requests\Coffee\CoffeeUpdateRequest;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    private  MyHttpResponse $myHttpResponse;

    public function __construct(MyHttpResponse $myHttpResponse)
    {
        $this->myHttpResponse = $myHttpResponse;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Coffee::all();
            if (!$data = empty($data) ? [] : $data->toArray()) {
                return $this->myHttpResponse->response(
                    false, 
                    [], 
                    MyHttpResponse::HTTP_NOT_FOUND, 
                    MyHttpResponse::NOT_FOUND_MESSAGE
                );
            }
    
            return $this->myHttpResponse->response(
                true, 
                $data, 
                MyHttpResponse::HTTP_OK, 
                MyHttpResponse::GET_SUCCESS_MESSAGE
            );
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->myHttpResponse->response(
                true, 
                [], 
                MyHttpResponse::HTTP_INTERNAL_SERVER_ERROR, 
                $e->getMessage()
            ); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoffeeStoreRequest $request)
    {
        try {
      
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->myHttpResponse->response(
                false, 
                [], 
                MyHttpResponse::HTTP_INTERNAL_SERVER_ERROR, 
                $e->getMessage()
            ); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Coffee::find($id);
            if (!$data = empty($data) ? [] : $data->toArray()) {
                return $this->myHttpResponse->response(
                    false, 
                    [], 
                    MyHttpResponse::HTTP_NOT_FOUND, 
                    MyHttpResponse::NOT_FOUND_MESSAGE
                );
            }
            
            return $this->myHttpResponse->response(
                true, 
                $data, 
                MyHttpResponse::HTTP_OK, 
                MyHttpResponse::GET_SUCCESS_MESSAGE
            );         
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->myHttpResponse->response(
                false, 
                [], 
                MyHttpResponse::HTTP_INTERNAL_SERVER_ERROR, 
                $e->getMessage()
            ); 
        }
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
        try {
            $coffee = Coffee::find($id);
            if (!$coffee = empty($coffee) ? [] : $coffee) {
                return $this->myHttpResponse->response(
                    false, 
                    [], 
                    MyHttpResponse::HTTP_NOT_FOUND, 
                    MyHttpResponse::NOT_FOUND_MESSAGE
                );
            }

            $data = [
                'name' => $request->name, 
                'price' => $request->price, 
                'type' => $request->type, 
                'brand' => $request->brand, 
                'description' => $request->description, 
                'status' => 1
            ];

            $coffee->update($data);

            return $this->myHttpResponse->response(
                true, 
                [], 
                MyHttpResponse::HTTP_OK, 
                MyHttpResponse::UPDATE_SUCCESS_MESSAGE
            );
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->myHttpResponse->response(
                false, 
                [], 
                MyHttpResponse::HTTP_INTERNAL_SERVER_ERROR, 
                $e->getMessage()
            ); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $coffee = Coffee::find($id);
            if (!$coffee = empty($coffee) ? [] : $coffee) {
                return $this->myHttpResponse->response(
                    false, 
                    [], 
                    MyHttpResponse::HTTP_NOT_FOUND, 
                    MyHttpResponse::NOT_FOUND_MESSAGE
                );
            }

            $coffee->delete();

            return $this->myHttpResponse->response(
                true, 
                [], 
                MyHttpResponse::HTTP_OK, 
                MyHttpResponse::DELETE_SUCCESS_MESSAGE
            );
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->myHttpResponse->response(
                false, 
                [], 
                MyHttpResponse::HTTP_INTERNAL_SERVER_ERROR, 
                $e->getMessage()
            ); 
        }
    }
}
