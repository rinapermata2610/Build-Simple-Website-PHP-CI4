<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // jika ada argumen, cek role
        if ($arguments && isset($arguments[0])) {
            $requiredRole = $arguments[0];
            if ($session->get('role') !== $requiredRole) {
                $response = Services::response();
                return $response->setStatusCode(403)->setBody('403 Forbidden: akses ditolak');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing
    }
}
