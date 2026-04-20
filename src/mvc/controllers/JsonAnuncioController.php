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
        if ($anuncio->hasMany('Ejemplar')){
            throw new ApiException("No se puede eliminar el lbro porque tiene
                ejemplares asociados");
        }
        $anuncio->deleteObject();
        if ($anuncio->portada){
            File::remove(BOOK_IMAGE_FOLDER . "/" . $anuncio->portada);
        }

        return new JsonResponse([$anuncio,
            "Borrado del anuncio $anuncio->titulo correcto."]);
    }

    public function post():JsonResponse{
        $anuncios = request()->fromJson('Anuncio');

        $response = new JsonResponse([], "Guardado correcto", 201, "CREATED");
        foreach($anuncios as $anuncio){
            $anuncio->saneate();
            try{
                $anuncio->save();
                $response->addData("$anuncio->titulo guardado correctamente");
            }catch(Throwable $t){
                $response->setMessage("Se han producido errores");
                $response->setStatus("WITH ERRORS");
                $response->addData($anuncio->titulo . " " .(DEBUG ? $t->getMessage() : "Duplicado?"));
            }
        }

        return $response;
    }
}