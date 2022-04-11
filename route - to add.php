//chat
Route::get('/chat/manutencao', function(){  require _CAMINHO_ADMIN. "chatGerir.php";});
Route::post('/chat/manutencao', function(){  require _CAMINHO_ADMIN. "chatGerir.php";});
Route::get(['set' => '/chat/listaMensagens', 'as' => 'users.ListaMensagensTrocadas'], 'ControllerChat@ListaMensagensTrocadas');
Route::post(['set' => '/chat/addMsg', 'as' => 'users.addMsg'], 'ControllerChat@addMsg');
Route::get(['set' => '/chat/read/{id}', 'as' => 'users.read'], 'ControllerChat@read');
Route::get(['set' => '/chat/news', 'as' => 'users.newsMsg'], 'ControllerChat@newsMsg');
