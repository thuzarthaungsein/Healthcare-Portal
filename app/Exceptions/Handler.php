<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Controllers\HomePageController;
use Session;
use Request;
use Illuminate\Auth\AuthenticationException;
use Response;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)

        {

            if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {

                return response()->json(['User have not permission for this page access.']);
            }

            // if ($this->isHttpException($exception)) {
            //     if ($exception->getStatusCode() == 404) {
            //         return response()->view('errors.404' . '404', [], 404);
            //     }
            // }
             return parent::render($request, $exception);

        }
     
       
}

