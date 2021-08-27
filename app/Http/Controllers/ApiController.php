<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;


trait ApiController
{
    /**
     * @var int
     */
    protected $statusCode=Response::HTTP_OK;

    /**
     * @return int
     */
    public function getStatusCode():int
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function respondNoContent()
    {
        return response()->noContent();
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers=[])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $index
     * @param $content
     *
     * @return mixed
     */
    public function respondWithError($index, $content)
    {
        return $this->respond([
            'errors'=>[
                $index=>[$content]
            ]
        ]);
    }

}
