<?php

class JsonAnuncioController extends Controller{
    public function get(mixed $param1=NULL, mixed $param2=NULL):JsonResponse{
        if(!$param1 && !$param2){
            $anuncios = Anuncio::all();
        }
        if($param1 && $param2){
            $anuncios = Anuncio::getFiltered($param1, $param2);
        }
        if($param1 && !$param2){
            $anuncios = [Anuncio::findOrFail(
                intval($param1),
                "No se ha encontrado el anuncio")];
        }

        return new JsonResponse(
            $anuncios,
            "Se han recuperado " . sizeof($anuncios) . " registros.");

    }

    public function delete(int|string $id = 0):JsonResponse{
        $anuncio = Anuncio::findOrFail(intval($id), "No se ha encontrado el anuncio");
        $anuncio->deleteObject();
        if ($anuncio->imagen){
            File::remove(ANUNCIO_IMAGE_FOLDER . "/" . $anuncio->imagen);
        }

        return new JsonResponse([$anuncio,
            "Borrado del anuncio $anuncio->titulo correcto."]);
    }

    public function post():JsonResponse{
        $anuncios = request()->fromJson('Anuncio');

        $response = new JsonResponse([], "Guardado correcto", 201, "CREATED");
        foreach($anuncios as $anuncio){
            $anuncio->saneate();
            $anuncio->iduser = 5; //id del usuario API (hardcoded ya que no implemento login y la bbdd requiere que no sea null)
            try{
                $anuncio->save();
                $response->addData("$anuncio->titulo guardado correctamente");
            }catch(Throwable $t){
                $response->setMessage("Se han producido errores");
                $response->setStatus("WITH ERRORS");
                $response->addData($anuncio->iduser . ' ' .$anuncio->titulo . " " .(DEBUG ? $t->getMessage() : "Duplicado?"));
            }
        }

        return $response;
    }
    public function put():JsonResponse{
        $anuncios = request()->fromJson('Anuncio');
        $response = new JsonResponse([], "Actualizacioón correcta");
        foreach($anuncios as $anuncio){
            try{
                if(empty($anuncio->id)){
                    throw new ApiException("No se indicó el identificador");
                }
                $anuncio->update();
                $response->addData("$anuncio->titulo actualizado correctamente");

            }catch(Throwable $t){
                $response->evaluateError($t);
                $response->setMessage("Se han producido errores");
                $response->setStatus("WITH ERRORS");
                $response->addData($anuncio->titulo . " " .(DEBUG ? $t->getMessage() : "Duplicado?"));
            }
        }
            return $response;
    }

    public function patch():JsonResponse{
        return $this->put();
    }
}