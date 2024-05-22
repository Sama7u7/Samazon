<?php


namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
public function combinar(Request $request)
{
    $token = $request->session()->get('api_token'); // Obtener el token
    $usuario = Usuario::where('token', $token)->first(); // Obtener el usuario

    // Recuperar todos los productos con estado 'consignado'
    $productosConsignados = Producto::where('estado', 'consignado')->get();

    // Pasar tanto el usuario como los productos consignados a la vista para mostrarlos
    return view('cliente.inicio-cliente', ['usuario' => $usuario, 'productos' => $productosConsignados]);
}
public function noconsignados(Request $request)
{
    $token = $request->session()->get('api_token'); // Obtener el token
    $usuario = Usuario::where('token', $token)->first(); // Obtener el usuario

    // Recuperar todos los productos con estado 'consignado'
    $productosNoConsignados = Producto::where('estado', 'propuesto')->get();

    // Pasar tanto el usuario como los productos consignados a la vista para mostrarlos
    return view('supervisor.inicio-supervisor', ['usuario' => $usuario, 'productos' => $productosNoConsignados]);
}
public function crear()
{
    return view('supervisor.crear-usuario');
}

public function index()
{
    $usuarios = Usuario::all(); // Obtener todos los usuarios

    return view('supervisor.usuario-index', compact('usuarios')); // Pasar los usuarios a la vista
}

public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'genero' => 'nullable|in:Masculino,Femenino',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|in:contador,supervisor,vendedor,cliente,encargado', // Validar el campo de rol
        ]);

        // Creación del nuevo usuario
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->genero = $request->genero;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->role = $request->rol; // Asignar el rol del usuario
        $usuario->save();

        // Redireccionar a una ruta apropiada (por ejemplo, la lista de usuarios)
        return redirect()->route('usuarios.index')->with('success', '¡Usuario creado exitosamente!');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('supervisor.edit-usuario', compact('usuario'));
    }
    public function resetPassword($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('encargado.edit-pass-usuario', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        
        // Actualizar los datos del usuario con los valores del formulario
        $usuario->email = $request->input('email');
        $usuario->role = $request->input('role');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->genero = $request->input('genero');
    
        // Actualizar la contraseña solo si se proporciona una nueva
        $password = $request->input('password');
        if (!empty($password)) {
            $usuario->password = Hash::make($password);
        }
    
        // Guardar los cambios en la base de datos
        $usuario->save();
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }



    public function newpass(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->email = $request->input('email');
        $usuario->role = $request->input('role');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->genero = $request->input('genero');
       
        // Actualizar la contraseña solo si se proporciona una nueva
        $password = $request->input('password');
        if (!empty($password)) {
            $usuario->password = Hash::make($password);
        }
    
        // Guardar los cambios en la base de datos
        $usuario->save();
    
        return redirect()->route('encargado.index')->with('success', 'Usuario actualizado correctamente');
    }
    

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
            'genero' => 'required|in:Masculino,Femenino',
        ]);

        // Crear un nuevo usuario con los datos del formulario
        $usuario = new Usuario();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->genero = $request->genero;
        $usuario->role = 'cliente'; // Asigna el rol de cliente por defecto
        $usuario->save();

        // Redireccionar al usuario después del registro
        return redirect()->route('login')->with('success', '¡Registro exitoso! Ingresa a nuestra plataforma.');
    }

    

public function indexroles()
{
    // Obtener usuarios con roles específicos
    $usuarios = Usuario::whereIn('role', ['encargado', 'contador', 'cliente'])->get();

    return view('encargado.index-roles', compact('usuarios'));
}

    
}