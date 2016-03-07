<?php

function errorResponse($error, $code){
	return response()->json(['error' => $error],  $code);
}

function successResponse($data) {
	return response()->json(['data' => $data], 200);
}

function validatorError($validatorErrors){
	$_err = 'bad_request';

	return response()->json(['error' => $_err, 'bad_params' => $validatorErrors]);
}

function getSocketUrl(){
	return env("SOCKET_PROTOCOL") . '://' . env("SOCKET_HOST") . ':'. env("SOCKET_PORT");
}

function hist($action, $content, $id) {
	\App\History::create([
		'action' => $action,
		'content' => $content,
		'user_id' => $id
	]);
}