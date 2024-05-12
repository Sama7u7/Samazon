@extends('layouts.master-guest')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

    <div class="row">
        <!-- ESPACIO A LOS LADOS -->
        <div class="col-xl-2"></div>

        <div class="col-xl-8" style="padding: 20px; display: flex; align-items: center;
                            justify-content: center;">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <!-- inicio tarjeta -->
                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/pnft7kcgiy2qirrrkcb9/MY22Fathom291_ColorAAmberGlow.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Fathon 29 1</h5>
                        <p class="card-text">$35,900 <del>$41,900</del>
                        </p>
                        <p class="card-text">Ahorras $5,910
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('Fathon 29 1', 35900, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/pnft7kcgiy2qirrrkcb9/MY22Fathom291_ColorAAmberGlow.jpg')">Añadir al carrito</a>
                    </div>
                </div>
                <!-- fin tarjeta -->

                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/kkigqu3s4mlndjfiy769/MY22Talon292_ColorAKnightShield.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Talon 2</h5>
                        <p class="card-text">$13990,000 <del>$15,790</del>
                        </p>
                        <p class="card-text">Ahorras $1,800
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('Talon 2', 13990, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/kkigqu3s4mlndjfiy769/MY22Talon292_ColorAKnightShield.jpg')">Añadir al carrito</a>
                    </div>
                </div>

                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/ssnyhzock3aaty3hbrzl/MY22Talon294_ColorAMetallicBlack.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Talon 4</h5>
                        <p class="card-text">$11,990 <del>$13,990</del>
                        </p>
                        <p class="card-text">Ahorras $2,000
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('Talon 4', 11990, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/ssnyhzock3aaty3hbrzl/MY22Talon294_ColorAMetallicBlack.jpg')">Añadir al carrito</a>
                    </div>
                </div>

            </div>

        </div>
        <!-- ESPACIO A LOS LADOS -->
        <div class="col-xl-2"></div>



    </div>
    <div class="row">
        <!-- ESPACIO A LOS LADOS -->
        <div class="col-xl-2"></div>

        <div class="col-xl-8" style="padding: 20px; display: flex; align-items: center;
                    justify-content: center;">
            <div class="row row-cols-1 row-cols-md-3 g-3">

                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/cnxweqj6opmsmfenmxte/MY22XTCAdvanced292_ColorABlack.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">XTC
                            ADVANCED 29 2</h5>
                        <p class="card-text">$69,990 <del>$72,900</del>
                        </p>
                        <p class="card-text">Ahorras $2,910
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('XTC ADVANCED 29 2', 69990, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/cnxweqj6opmsmfenmxte/MY22XTCAdvanced292_ColorABlack.jpg')">Añadir al carrito</a>
                    </div>
                </div>

                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/l6rutyf2yjuljmultiu1/MY21-Talon-Eplus-3-29_Color-A-Blue-Ashes.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Talon E+ 3</h5>
                        <p class="card-text">$54,990 <del>$59,990</del>
                        </p>
                        <p class="card-text">Ahorras $5,000
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('Talon E+ 3', 54990, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/l6rutyf2yjuljmultiu1/MY21-Talon-Eplus-3-29_Color-A-Blue-Ashes.jpg')">Añadir al carrito</a>
                    </div>
                </div>


                <div class="card" style="width: 25rem;">
                    <img src="https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/khshpgw9qmkiyzmcyina/MY21-Escape-3-Disc_Color-A-Metallic-Black.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Escape 3 Disc</h5>
                        <p class="card-text">$13,490 <del>$14,590</del>
                        </p>
                        <p class="card-text">Ahorras $1,100
                        </p>
                        <a href="/login" class="btn btn-primary" onclick="addToCart('Escape 3 Disc', 13490, 1, 'https://images2.giant-bicycles.com/b_white%2Cc_pad%2Ch_400%2Cq_80%2Cw_600/khshpgw9qmkiyzmcyina/MY21-Escape-3-Disc_Color-A-Metallic-Black.jpg')">Añadir al carrito</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- ESPACIO A LOS LADOS -->
        <div class="col-xl-2"></div>
        @endsection