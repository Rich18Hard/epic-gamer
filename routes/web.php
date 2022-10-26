    <?php

    use App\Http\controllers\DashboardController;
    use App\Http\controllers\SiswaController;
    use App\Http\controllers\ProjectsController;
    use App\Http\controllers\ContactsController;
    use App\Http\controllers\LoginController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    // Route::get('/', function () {
    //     return view('admin.mastersiswa');
    // });

    // Route::get('/home', function () {
    //     return view('home');
    // });

    // Route::get('/about', function () {
    //     return view('about');
    // });

    // Route::get('/projects', function () {
    //     return view('projects');
    // });

    // Route::get('/contact', function () {
    //     return view('contact');
    // });

    // Route::get('/mastersiswa', function () {
    //     return view('admin.mastersiswa');
    // });


    // Route::get('/admin', [DashboardController::class, 'index' ])->middleware('guest');
    // Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    // Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus' ])->name('mastersiswa.hapus');
    route::resource('mastersiswa', SiswaController::class);
    route::resource('mastercontacts', ContactsController::class);
    route::resource('masterprojects', ProjectsController::class);

    Route::get('/masterprojects', function () {
        return view('admin.masterprojects');
    });

    Route::get('/mastercontact', function () {
        return view('admin.mastercontact');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Route::middleware('auth')->group(function(){
    //     Route::get('/admin', [DashboardController::class, 'index']);
    //     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //     Route::get('/mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus' ])->name('mastersiswa.hapus');
    //     route::resource('mastersiswa', SiswaController::class);
    //     route::resource('mastercontacts', ContactsController::class);
    //     route::resource('masterprojects', ProjectsController::class);
    // });

    // Route::middleware('guest')->group(function(){
    //     Route::get('/login', [LoginController::class, 'index'])->name('login');
    //     Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    //     Route::get('/', function(){return view('home');});
    //     Route::get('/about', function(){return view('about');});
    //     Route::get('/project', function(){return view('project');});
    //     Route::get('/contact', function(){return view('contact');});
    // });
