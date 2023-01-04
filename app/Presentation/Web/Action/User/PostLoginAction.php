<?php

namespace App\Presentation\Web\Action\User;

use App\Domain\Exception\LoginFailedException;
use App\Domain\UseCase\User\LoginUserUseCase;
use App\Presentation\Web\Assembler\User\LoginRequestAssembler;
use App\Presentation\Web\Requests\User\PostLoginRequest;
use App\Presentation\Web\Responder;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use UserRoutes;

class PostLoginAction extends Controller
{

    private const ERROR_MESSAGE = "Something went wrong";

    private LoginUserUseCase $loginUserUseCase;

    public function __construct(
        LoginUserUseCase $loginUserUseCase
    )
    {
        $this->loginUserUseCase = $loginUserUseCase;
    }

    public function __invoke(PostLoginRequest $request): RedirectResponse
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        try {
            $this->loginUserUseCase->process($email, $password);
        } catch (LoginFailedException $exception) {
            return redirect()->route('get_user_login')->withErrors($exception->getMessage());
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('post_user_login')->withErrors(self::ERROR_MESSAGE);
        }

        return redirect()->route('get_user_login');
    }


}
