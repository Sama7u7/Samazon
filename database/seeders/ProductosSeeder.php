<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 30 productos propuestos
        for ($i = 1; $i <= 30; $i++) {
            Producto::create([
                'nombre' => "ProductoConsignado " . $i,
                'imagen' => '', 
                'estado' => 'consignado',
                'fecha_publicacion' => date('Y-m-d'), 
                'motivo' => null, 
                'descripcion' => 'Descripción del producto ' . $i,
                'cantidad' => 1,
                'categoria_id' => rand(1, 5), 
                'propietario_id' => 1 
                
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Producto::create([
                'nombre' => "ProductoConsignado " . $i,
                'imagen' => '', 
                'estado' => 'propuesto',
                'fecha_publicacion' => date('Y-m-d'), 
                'motivo' => null, 
                'descripcion' => 'Descripción del producto ' . $i,
                'cantidad' => 1,
                'categoria_id' => rand(1, 5), 
                'propietario_id' => 1 
            ]);
        }
        
        Producto::create([
            'nombre' => 'Teléfono inteligente Samsung Galaxy S20',
            'imagen' => 'https://cdn1.coppel.com/images/catalog/mkp/1042/10000/10429024-1.jpg',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Teléfono móvil de gama alta con pantalla AMOLED de 6.2 pulgadas, cámara de 64 MP, y 128 GB de almacenamiento.',
            'cantidad' => '5',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Cafetera Nespresso Vertuo Plus',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Máquina de café automática que prepara diferentes tamaños de café con solo tocar un botón.',
            'cantidad' => '3',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Termómetro Digital Infrarrojo',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Termómetro sin contacto que mide la temperatura corporal con precisión en segundos.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Juego de Destornilladores de Precisión',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Kit de herramientas con destornilladores de diferentes tamaños para reparaciones electrónicas y pequeñas.',
            'cantidad' => '10',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Cámara de seguridad WiFi',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Cámara de vigilancia con visión nocturna, detección de movimiento y transmisión en tiempo real a través de una aplicación móvil.',
            'cantidad' => '8',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Auriculares Inalámbricos Bluetooth',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Auriculares sin cables con cancelación de ruido y micrófono integrado para llamadas manos libres.',
            'cantidad' => '3',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Aspiradora Robot Inteligente',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Robot aspirador con mapeo inteligente y control mediante aplicación móvil para limpieza automática del hogar.',
            'cantidad' => '1',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Pulsioxímetro de Dedo',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Dispositivo portátil para medir la saturación de oxígeno en la sangre y la frecuencia cardíaca.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Taladro Inalámbrico',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Taladro eléctrico sin cable con función de percusión para perforaciones en diferentes materiales.',
            'cantidad' => '5',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Proyector LED Full HD',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Proyector portátil con resolución Full HD, ideal para ver películas y hacer presentaciones profesionales.',
            'cantidad' => '2',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Smartwatch Xiaomi Mi Band 6',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Reloj inteligente con monitor de actividad física, monitor de sueño y pantalla AMOLED a color.',
            'cantidad' => '4',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Robot de Cocina Multifunción',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Cocina automática con múltiples funciones como batir, picar, cocinar al vapor y más.',
            'cantidad' => '3',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Báscula Digital de Cocina',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Báscula electrónica precisa para pesar ingredientes con precisión en recetas de cocina.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Juego de Llaves Inglesas',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Set de llaves ajustables de diferentes tamaños para reparaciones mecánicas y de fontanería.',
            'cantidad' => '10',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Impresora Multifunción Inalámbrica',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Impresora láser que imprime, escanea y copia documentos de forma inalámbrica desde dispositivos móviles.',
            'cantidad' => '8',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Altavoz Bluetooth JBL Flip 5',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Altavoz portátil resistente al agua con sonido potente y conectividad Bluetooth.',
            'cantidad' => '3',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Juego de Sartenes Antiadherentes',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Set de sartenes de cocina con revestimiento antiadherente y mangos ergonómicos.',
            'cantidad' => '1',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Medidor de Presión Arterial Automático',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Dispositivo digital para medir la presión arterial en casa de manera rápida y precisa.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Sierra Circular Eléctrica',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Herramienta eléctrica para cortes precisos en madera, plástico y otros materiales.',
            'cantidad' => '5',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Laptop Lenovo ThinkPad X1 Carbon',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Portátil ultradelgado y ligero con procesador Intel Core i7 y pantalla táctil de alta resolución.',
            'cantidad' => '2',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Smart TV Samsung 55"',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Televisor inteligente con resolución 4K UHD, sistema operativo Tizen y compatibilidad con asistentes de voz.',
            'cantidad' => '6',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Robot Aspirador iRobot Roomba',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Aspiradora robot con tecnología de mapeo y navegación inteligente para una limpieza eficiente.',
            'cantidad' => '4',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Monitor de Presión Arterial de Muñeca',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Dispositivo compacto y portátil para medir la presión arterial de manera cómoda en la muñeca.',
            'cantidad' => '3',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Kit de Herramientas para Carpintería',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Conjunto completo de herramientas manuales para trabajos de carpintería y bricolaje en casa.',
            'cantidad' => '9',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Barra de Sonido Sony 2.1',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Sistema de audio para televisores con subwoofer inalámbrico, Bluetooth y sonido envolvente.',
            'cantidad' => '7',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Reloj Despertador Digital LED',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Reloj despertador con pantalla LED grande y función de alarma gradual para despertares suaves.',
            'cantidad' => '2',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Licuadora de Alta Potencia',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Licuadora con motor de 1000W y cuchillas de acero inoxidable para preparar batidos y jugos.',
            'cantidad' => '3',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Termómetro Digital para Frente y Oído',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Termómetro infrarrojo sin contacto con pantalla LCD para medir la temperatura en la frente y el oído.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Kit de Herramientas para Reparación de Teléfonos',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Conjunto de herramientas especializadas para desmontar y reparar teléfonos móviles y tabletas.',
            'cantidad' => '10',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Barra de Sonido LG con Subwoofer',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Sistema de audio para televisores con subwoofer inalámbrico, sonido envolvente y conexión Bluetooth.',
            'cantidad' => '8',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        
        Producto::create([
            'nombre' => 'Altavoz Inteligente Amazon Echo Dot',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Altavoz inteligente con asistente virtual Alexa, control por voz y reproducción de música en streaming.',
            'cantidad' => '3',
            'categoria_id' => '1',
            'propietario_id' => '1'
        ]);
        
        Producto::create([
            'nombre' => 'Set de Ollas y Sartenes de Acero Inoxidable',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Juego completo de ollas y sartenes de cocina de acero inoxidable con tapas herméticas.',
            'cantidad' => '1',
            'categoria_id' => '2',
            'propietario_id' => '2'
        ]);
        
        Producto::create([
            'nombre' => 'Tensiómetro de Brazo Digital',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Dispositivo automático para medir la presión arterial en el brazo con pantalla LCD y memoria de almacenamiento.',
            'cantidad' => '2',
            'categoria_id' => '3',
            'propietario_id' => '3'
        ]);
        
        Producto::create([
            'nombre' => 'Juego de Brocas para Taladro',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Set de brocas de diferentes tamaños y tipos para perforar madera, metal, plástico y más.',
            'cantidad' => '5',
            'categoria_id' => '4',
            'propietario_id' => '4'
        ]);
        
        Producto::create([
            'nombre' => 'Tablet Samsung Galaxy Tab S7',
            'imagen' => '',
            'fecha_publicacion' => '2024-05-06',
            'motivo' => '',
            'descripcion' => 'Tablet con pantalla de 11 pulgadas, S Pen incluido, procesador Snapdragon y 128 GB de almacenamiento.',
            'cantidad' => '2',
            'categoria_id' => '5',
            'propietario_id' => '5'
        ]);
        Producto::create([
    'nombre' => 'Cámara de Seguridad CCTV',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Sistema de videovigilancia con cámaras HD y grabación continua para monitorear el hogar o negocio.',
    'cantidad' => '4',
    'categoria_id' => '1',
    'propietario_id' => '1'
]);

Producto::create([
    'nombre' => 'Batidora de Mano Eléctrica',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Batidora de mano con múltiples velocidades y accesorios para mezclar, batir y triturar ingredientes.',
    'cantidad' => '3',
    'categoria_id' => '2',
    'propietario_id' => '2'
]);

Producto::create([
    'nombre' => 'Masajeador de Espalda y Cuello',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Dispositivo de masaje con calor infrarrojo y rodillos para aliviar la tensión muscular en la espalda y el cuello.',
    'cantidad' => '2',
    'categoria_id' => '3',
    'propietario_id' => '3'
]);

Producto::create([
    'nombre' => 'Set de Llaves de Vaso',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Juego de llaves de vaso métricas e imperiales con trinquete y adaptadores para diferentes tipos de tornillos.',
    'cantidad' => '8',
    'categoria_id' => '4',
    'propietario_id' => '4'
]);

Producto::create([
    'nombre' => 'Barra de Sonido Sony 5.1',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Sistema de audio para cine en casa con sonido envolvente 5.1 canales, subwoofer inalámbrico y conexión HDMI ARC.',
    'cantidad' => '6',
    'categoria_id' => '5',
    'propietario_id' => '5'
]);

Producto::create([
    'nombre' => 'Auriculares con Cancelación de Ruido Sony WH-1000XM4',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Auriculares inalámbricos con cancelación de ruido adaptativa, batería de larga duración y calidad de audio superior.',
    'cantidad' => '3',
    'categoria_id' => '1',
    'propietario_id' => '1'
]);

Producto::create([
    'nombre' => 'Robot de Cocina Moulinex Cuisine Companion',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Robot de cocina multifunción con 6 programas automáticos y accesorios para cocinar una amplia variedad de platos.',
    'cantidad' => '1',
    'categoria_id' => '2',
    'propietario_id' => '2'
]);

Producto::create([
    'nombre' => 'Pulsioxímetro de Muñeca',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Dispositivo portátil para medir la saturación de oxígeno en la sangre y el pulso desde la muñeca.',
    'cantidad' => '2',
    'categoria_id' => '3',
    'propietario_id' => '3'
]);

Producto::create([
    'nombre' => 'Taladro Percutor de Impacto',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Taladro eléctrico con función de percusión para perforaciones en hormigón, ladrillo y otras superficies duras.',
    'cantidad' => '5',
    'categoria_id' => '4',
    'propietario_id' => '4'
]);

Producto::create([
    'nombre' => 'Smart TV LG OLED 65"',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Televisor OLED de alta definición con pantalla de 65 pulgadas, inteligencia artificial y control por voz.',
    'cantidad' => '2',
    'categoria_id' => '5',
    'propietario_id' => '5'
]);

Producto::create([
    'nombre' => 'Balanza Digital para Baño',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Báscula electrónica para medir el peso corporal con precisión y pantalla LCD de fácil lectura.',
    'cantidad' => '4',
    'categoria_id' => '1',
    'propietario_id' => '1'
]);

Producto::create([
    'nombre' => 'Robot Limpiacristales Automático',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Dispositivo robótico para limpiar ventanas y superficies acristaladas de manera automática y eficiente.',
    'cantidad' => '3',
    'categoria_id' => '2',
    'propietario_id' => '2'
]);

Producto::create([
    'nombre' => 'Termómetro de Cocina Digital',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Termómetro para alimentos con sonda de acero inoxidable y pantalla LCD para cocinar con precisión.',
    'cantidad' => '2',
    'categoria_id' => '3',
    'propietario_id' => '3'
]);

Producto::create([
    'nombre' => 'Set de Llaves Allen',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Juego de llaves Allen de diferentes tamaños para apretar y aflojar tornillos hexagonales.',
    'cantidad' => '8',
    'categoria_id' => '4',
    'propietario_id' => '4'
]);

Producto::create([
    'nombre' => 'Auriculares Inalámbricos Bose QuietComfort 45',
    'imagen' => '',
    'fecha_publicacion' => '2024-05-06',
    'motivo' => '',
    'descripcion' => 'Auriculares Bluetooth con cancelación de ruido, ecualizador ajustable y hasta 24 horas de autonomía.',
    'cantidad' => '6',
    'categoria_id' => '5',
    'propietario_id' => '5'
]);
        
    }
    }