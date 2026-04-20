<?php

/** Blocked User middleware
 *
 * Comprueba si el usuario que ha hecho login está bloqueado. 
 *
 * Última revisión: 12/04/2026
 *
 * @author Robert Sallent <robert@fastlight.org>
 * @since v0.1.0
 */

class BlockedUser{
    
    /**
     * El método handle() es invocado automáticamente por el Kernel
     *
     * @param Request $request petición
     * @param Closure $next siguiente método a ser invocado (para el pipeline)
     * @return Response la respuesta final a retornar al cliente
     */
    public function handle(Request $request, Closure $next){
            
        // tomamos el usuario identificado
        $user = user();
        
        // si hay usuario identificado y está bloqueado...
        if($user && $user->hasRole(ROLE_BLOCKED) && request()->url != BLOCKED_REDIRECT){
            
            // echa al usuario de la sesión
            Login::unset();
            
            // finaliza la ejecución, retornando la respuesta
            return new JsonResponse([], "Usuario bloqueado", 403, "FORBIDDEN");
        }
                
        // deja avanzar la petición por el pipeline
        return $next($request);
    }  
}

