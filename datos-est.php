<section class="datos-est mt-5">
    <div class="container">
        <a class="anchor-scroll" id="datos-est"></a>
        <h1 class="section-title bold-font">1. datos estadísticos</h1>
        <p class="info light-font mt-4 mb-5">La cantidad de personas muertas por las fuerzas de seguridad es un
            indicador muy
            importante: una policía profesional brinda seguridad con un uso mínimo de la fuerza en situaciones
            excepcionales. Un número alto de intervenciones policiales letales podría significar que las fuerzas de
            seguridad no están bien preparadas o que la violencia institucional es promovida o tolerada por las
            autoridades y por la sociedad. El análisis pormenorizado de estas muertes –incluso cuando fueron provocadas
            por un uso legal de la fuerza- debe ser un componente central de las políticas de seguridad orientadas a
            reducir la violencia social y estatal.<br />
            Salvo pocas excepciones, las autoridades no consideran al uso de la fuerza policial como un problema
            relevante, lo que explica la ausencia de políticas de prevención de este tipo de violencia. La poca
            información oficial que se produce está dispersa y discontinuada y es de muy difícil acceso. Este déficit de
            larga data obstruye la construcción de indicadores de desempeño policial desde una perspectiva de derechos
            humanos. Frente a estas carencias, el CELS realiza desde 1996 una base de datos que registra hechos de
            violencia letal y no letal en los que participaron funcionaries de instituciones de seguridad.
        </p>
        <div class="block">
            <p class="block-title medium-font mb-0">Personas muertas en hechos de violencia con participación de fuerzas
                de seguridad.</p>
            <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                <div ng-controller="HomeController as homeCtrl">
                    <div>
                        <div ng-show="loading">
                            <progress class="loader-mail pure-material-progress-linear" />
                        </div>
                        <h5 ng-show="!loading && currentH.length == 0"> No hay resultado para los valores elegidos. Por
                            favor, elegí otro filtro. </h5>
                    </div>
                    <div class="graphic d-flex flex-column flex-md-row">
                <div class="col-12 col-lg-10">
                    <div class='chart'>
                        <div id='chart'></div>
                    </div>
                </div>
                <div class="options d-none d-lg-block col-2">
                    <div class="form-group">
                        <label class="col-sm-12 control-label">Filtros</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                    on-select="onActiveProvincia($item,$model)">
                                    <ui-select-match placeholder="Lugar">{{$select.selected.key}}</ui-select-match>
                                    <ui-select-choices repeat="item in provincias | filter: $select.search">
                                        <div ng-bind-html="item.key | highlight: $select.search"></div>
                                        <small ng-bind-html="item.key | highlight: $select.search"></small>
                                    </ui-select-choices>
                                </ui-select>
                                <span class="input-group-btn">
                                    <button type="button"
                                        ng-click="homeCtrl.ap.selected = undefined; onActiveProvincia();"
                                        class="btn btn-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group">
                                <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                    on-select="onActiveGenero($item,$model,$select)">
                                    <ui-select-match placeholder="Género">{{$select.selected.key}}</ui-select-match>
                                    <ui-select-choices repeat="item in genero | filter: $select.search">
                                        <div ng-bind-html="item.key | highlight: $select.search"></div>
                                        <small ng-bind-html="item.key | highlight: $select.search"></small>
                                    </ui-select-choices>
                                </ui-select>
                                <span class="input-group-btn">
                                    <button type="button" ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                        class="btn btn-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group">
                                <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                    on-select="onActiveInstitucion($item,$model)">
                                    <ui-select-match placeholder="Institución">{{$select.selected.key}}
                                    </ui-select-match>
                                    <ui-select-choices repeat="item in institucion | filter: $select.search">
                                        <div ng-bind-html="item.key | highlight: $select.search"></div>
                                        <small ng-bind-html="item.key | highlight: $select.search"></small>
                                    </ui-select-choices>
                                </ui-select>
                                <span class="input-group-btn">
                                    <button type="button"
                                        ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                        class="btn btn-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group">
                                <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                    on-select="onActiveYear($item,$model)">
                                    <ui-select-match placeholder="Año">{{$select.selected.key}}</ui-select-match>
                                    <ui-select-choices repeat="item in years | filter: $select.search">
                                        <div ng-bind-html="item.key | highlight: $select.search"></div>
                                        <small ng-bind-html="item.key | highlight: $select.search"></small>
                                    </ui-select-choices>
                                </ui-select>
                                <span class="input-group-btn">
                                    <button type="button" ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                        class="btn btn-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
                            </div>
                            <span class="input-group-btn c">
                                <button ng-click="exportCSV()" type="button" class="btn btn-danger ">Exportar
                                    CSV</button>
                            </span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <p class="info light-font mt-2 mb-5 my-md-5">En los últimos años, la cantidad de personas muertas en hechos de
            violencia
            con
            participación de fuerzas de seguridad descendió levemente. En cuanto a les particulares, esta tendencia
            comenzó luego de un pico en 2014. Respecto de les funcionaries, hace más de quince años que el número se
            mantiene relativamente estable. En ambos grupos persiste un núcleo de muertes que el Estado no pudo
            reducir.
        </p>
    </div>
    <div class="container">
        <div class="sub-group mt-4">
            <h2 class="red-title medium-font mb-5">particulares</h2>
            <div class="block">
                <p class="block-title medium-font mb-0">Particulares muertes por funcionaries de fuerzas de seguridad,
                    según
                    institución del funcionarie interviniente.</p>
                    <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                <div ng-controller="CivilesController as homeCtrl">
                    <div>
                        <div ng-show="loading">
                            <progress class="loader-mail pure-material-progress-linear" />
                        </div>
                        <h5 ng-show="!loading && currentH.length == 0"> No hay resultado para los valores elegidos. Por
                            favor, elegí otro filtro. </h5>
                    </div>
                    <div class="graphic d-flex">
                        <div class="col-12 col-lg-10">
                            <div class='chart'>
                                <div id='civiles-inst-chart'></div>
                            </div>
                        </div>
                        <div class="options d-none d-lg-block col-2">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Filtros</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                            on-select="onActiveProvincia($item,$model)">
                                            <ui-select-match placeholder="Lugar">{{$select.selected.key}}
                                            </ui-select-match>
                                            <ui-select-choices repeat="item in provincias | filter: $select.search">
                                                <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                <small ng-bind-html="item.key | highlight: $select.search"></small>
                                            </ui-select-choices>
                                        </ui-select>
                                        <span class="input-group-btn">
                                            <button type="button"
                                                ng-click="homeCtrl.ap.selected = undefined; onActiveProvincia();"
                                                class="btn btn-default">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                            on-select="onActiveGenero($item,$model,$select)">
                                            <ui-select-match placeholder="Género">{{$select.selected.key}}
                                            </ui-select-match>
                                            <ui-select-choices repeat="item in genero | filter: $select.search">
                                                <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                <small ng-bind-html="item.key | highlight: $select.search"></small>
                                            </ui-select-choices>
                                        </ui-select>
                                        <span class="input-group-btn">
                                            <button type="button"
                                                ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                                class="btn btn-default">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                            on-select="onActiveInstitucion($item,$model)">
                                            <ui-select-match placeholder="Institución">{{$select.selected.key}}
                                            </ui-select-match>
                                            <ui-select-choices repeat="item in institucion | filter: $select.search">
                                                <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                <small ng-bind-html="item.key | highlight: $select.search"></small>
                                            </ui-select-choices>
                                        </ui-select>
                                        <span class="input-group-btn">
                                            <button type="button"
                                                ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                                class="btn btn-default">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                            on-select="onActiveYear($item,$model)">
                                            <ui-select-match placeholder="Año">{{$select.selected.key}}
                                            </ui-select-match>
                                            <ui-select-choices repeat="item in years | filter: $select.search">
                                                <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                <small ng-bind-html="item.key | highlight: $select.search"></small>
                                            </ui-select-choices>
                                        </ui-select>
                                        <span class="input-group-btn">
                                            <button type="button"
                                                ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                                class="btn btn-default">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <span class="input-group-btn c">
                                        <button ng-click="exportCSV()" type="button" class="btn btn-danger ">Exportar
                                            CSV</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="info light-font mt-2 mb-5 my-md-5">Salvo durante algunos períodos, históricamente la
                        Policía Bonaerense
                        concentra la mayor cantidad de hechos de violencia letal. En los últimos años la creación de
                        policías locales profundizó esta tendencia. Al mismo tiempo, a fines de 2016, la puesta en
                        funcionamiento de la Policía de la Ciudad, que recibió a gran parte del personal de la Policía
                        Federal, hizo que las muertes que acumulaba la Policía Federal se repartieran entre dos fuerzas.
                        Actualmente, las cuatro fuerzas federales (Gendarmería, Prefectura Naval, Policía Federal y
                        Policía
                        de Seguridad Aeroportuaria) son responsables de alrededor de un tercio de las muertes
                        registradas en
                        Capital Federal y Conurbano.
                    </p>
                </div>
                <div class="block">
                    <p class="block-title medium-font mb-0">Particulares muertes por funcionaries de fuerzas de seguridad,
                        según edad.</p>
                    <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                    <p class="mb-md-5">Se muestran las edades que pudieron ser documentadas. </p>
                    <div ng-controller="FuncionariosController as homeCtrl">
                        <div>
                            <div ng-show="loading">
                                <progress class="loader-mail pure-material-progress-linear" />
                            </div>
                            <h5 ng-show="!loading && no_results == 0"> No hay resultado para los valores elegidos.
                                Por favor, elegí otro filtro. </h5>
                        </div>
                        <div class="graphic d-flex">
                            <div class="col-12 col-lg-10">
                                <div class='chart'>
                                    <div id='func-inst-chart'></div>
                                </div>
                            </div>
                            <div class="options d-none d-lg-block col-2">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Filtros</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                                on-select="onActiveProvincia($item,$model)">
                                                <ui-select-match placeholder="Lugar">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in provincias | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ap.selected = undefined; onActiveProvincia();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                                on-select="onActiveGenero($item,$model,$select)">
                                                <ui-select-match placeholder="Género">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in genero | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                                on-select="onActiveInstitucion($item,$model)">
                                                <ui-select-match placeholder="Institución">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices
                                                    repeat="item in institucion | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                                on-select="onActiveYear($item,$model)">
                                                <ui-select-match placeholder="Año">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in years | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <span class="input-group-btn c">
                                            <button ng-click="exportCSV()" type="button"
                                                class="btn btn-danger ">Exportar CSV</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="info light-font mt-4 my-5">El perfil demográfico de quienes murieron por acción de
                            funcionaries policiales y de seguridad en el Área Metropolitana de Buenos Aires (AMBA)
                            muestra que los
                            varones jóvenes son el grupo más afectado por la letalidad policial. Del total de
                            particulares
                            muertes de quienes existen datos etarios, siete de cada diez eran varones de entre 15 y 27
                            años. Entre
                            las mujeres, casi la mitad tenía menos de 28 años. Mientras que el 83% de los varones
                            murieron
                            en presuntos enfrentamientos armados, el 40% de las mujeres fallecieron porque el
                            funcionario
                            utilizó el arma sin estar de servicio, haciendo un uso particular de la fuerza policial.
                            Casi
                            siempre se trató de un <a href="#femicidios" target="_self" style="color: #e22929">femicidio</a>.</p>
                    </div>
                    <div class="block">
                        <p class="block-title medium-font mb-0">Particulares muertes por funcionaries de fuerzas de
                            seguridad, según
                            el lugar de los hechos.
                        </p>
                        <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                        <div class="graphic d-flex" ng-controller="CivilesMapController as homeCtrl">
                            <div class="col-12 col-lg-6 p-0">
                                <div ng-show="loading">
                                    <progress class="loader-mail pure-material-progress-linear" />
                                </div>
                               
                                
                                <div class='chart map'>
                                    <div id="civiles-map-graph"></div>
                                    <p  class="d-lg-none map-detail" >
                                         <span ng-show="!loading && currentH.length == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </span>
                                <span ng-show="!loading && currentH.length > 0 && currentVictims == 0"> Elegí un lugar del
                                    mapa para explorar. </span>
                                    <span ng-show="currentH.length > 0 && currentVictims > 0"> 

                                    {{currentVictims}} personas en
                                    <span class="city"> {{currentCity}} </span> <span class="number"> {{currentPercentage | number:2}} %</small>
                                    </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-none d-lg-block col-4">
                                <p  class="map-detail" >
                                         <span ng-show="!loading && currentH.length == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </span>
                                <span ng-show="!loading && currentH.length > 0 && currentVictims == 0"> Elegí un lugar del
                                    mapa para explorar. </span>
                                    <span ng-show="currentH.length > 0 && currentVictims > 0"> 

                                    {{currentVictims}} personas en
                                    <span class="city"> {{currentCity}} </span> <span class="number"> {{currentPercentage | number:2}} %</small>
                                    </span>
                                    </p>
                            </div>
                            <div class="options d-none d-lg-block col-2">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Filtros</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                                on-select="onActiveLugar($item,$model)">
                                                <ui-select-match placeholder="Lugar">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in lugares | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ap.selected = undefined; onActiveLugar();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                                on-select="onActiveGenero($item,$model,$select)">
                                                <ui-select-match placeholder="Género">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in genero | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                                on-select="onActiveInstitucion($item,$model)">
                                                <ui-select-match placeholder="Institución">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices
                                                    repeat="item in institucion | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                                on-select="onActiveYear($item,$model)">
                                                <ui-select-match placeholder="Año">{{$select.selected.key}}
                                                </ui-select-match>
                                                <ui-select-choices repeat="item in years | filter: $select.search">
                                                    <div ng-bind-html="item.key | highlight: $select.search"></div>
                                                    <small ng-bind-html="item.key | highlight: $select.search"></small>
                                                </ui-select-choices>
                                            </ui-select>
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                                    class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <span class="input-group-btn c">
                                            <button ng-click="exportCSV()" type="button"
                                                class="btn btn-danger ">Exportar CSV</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="info light-font mt-4 mb-5">La Ciudad de Buenos Aires concentra aproximadamente el 20%
                            de la
                            población
                            del AMBA, mientras que el 80% vive en el Conurbano. El total acumulado registrado de
                            particulares
                            muertes por fuerzas de seguridad se distribuye con esa misma proporción. En los últimos años
                            se
                            observa una tendencia a concentrar mayor proporción de muertes en el Conurbano: desde 2011
                            cada año
                            los casos registrados en el Gran Buenos Aires representan al menos el 85%. Los valores del
                            último año exacerbaron esta tendencia: fueron 9 de cada 10 casos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grey-bg py-5">
        <div class="container sub-group py-3 mt-4">
            <h2 class="red-title medium-font mb-md-4">funcionaries</h2>
            <div class="block">
                <p class="block-title medium-font mb-md-0">Funcionaries muertes en hechos de
                    violencia, según institución.</p>
                <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                <div ng-controller="FuncionariosIController as homeCtrl">
                    <div>
                <div ng-show="loading">
                    <progress class="loader-mail pure-material-progress-linear" />
                </div>
                <h5 ng-show="!loading && currentH.length == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </h5>
                                </div>
                <div class="graphic d-flex" >

                    <div class="col-12 col-lg-10">
                        <div class='chart'>
                            <div id='funcionarios-in-chart'></div>
                        </div>
                    </div>
                    <div class="options d-none d-lg-block col-2">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Filtros</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                        on-select="onActiveProvincia($item,$model)">
                                        <ui-select-match placeholder="Lugar">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in provincias | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ap.selected = undefined; onActiveProvincia();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                        on-select="onActiveGenero($item,$model,$select)">
                                        <ui-select-match placeholder="Género">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in genero | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                        on-select="onActiveInstitucion($item,$model)">
                                        <ui-select-match placeholder="Institución">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in institucion | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                        on-select="onActiveYear($item,$model)">
                                        <ui-select-match placeholder="Año">{{$select.selected.key}}
                                        </ui-select-match>
                                        <ui-select-choices repeat="item in years | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <span class="input-group-btn c">
                                    <button ng-click="exportCSV()" type="button" class="btn btn-danger ">Exportar
                                        CSV</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="info light-font mt-4 my-md-5">
                    Más del 40% de les funcionaries muertes son de la Policía Federal, mientras que un porcentaje apenas menor eran de las policías de la provincia de Buenos Aires (Bonaerense y locales).
                    Al igual que les particulares, casi la mitad
                    de les funcionaries muertes
                    son
                    de las policías de la provincia de Buenos Aires (Bonaerense y locales), mientras
                    que un tercio
                    pertenecen a la Policía de la Ciudad. A pesar del despliegue territorial de
                    Gendarmería y Prefectura
                    en la CABA y en el Conurbano, les funcionaries de las fuerzas federales que
                    fallecieron no
                    representan una proporción significativa.
                </p>
            </div>
            <div class="block">
                <p class="block-title medium-font mb-0">Funcionaries muertes en hechos de violencia,
                    según edad.
                </p>
                <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                <p class="mb-md-5">Se muestran las edades que pudieron ser documentadas. </p>
                  <div ng-controller="FuncionariosMController as homeCtrl">
                    <div>
                <div ng-show="loading">
                    <progress class="loader-mail pure-material-progress-linear" />
                </div>
                <h5 ng-show="!loading && no_results == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </h5>
                                </div>
                <div class="graphic d-flex" >
                    <div class="col-12 col-lg-10">
                        <div class='chart'>
                            <div id='func-edad-chart'></div>
                        </div>
                    </div>
                    <div class="options d-none d-lg-block col-2">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Filtros</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                        on-select="onActiveProvincia($item,$model)">
                                        <ui-select-match placeholder="Lugar">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in provincias | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ap.selected = undefined; onActiveProvincia();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                        on-select="onActiveGenero($item,$model,$select)">
                                        <ui-select-match placeholder="Género">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in genero | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                        on-select="onActiveInstitucion($item,$model)">
                                        <ui-select-match placeholder="Institución">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in institucion | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                        on-select="onActiveYear($item,$model)">
                                        <ui-select-match placeholder="Año">{{$select.selected.key}}
                                        </ui-select-match>
                                        <ui-select-choices repeat="item in years | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <span class="input-group-btn c">
                                    <button ng-click="exportCSV()" type="button" class="btn btn-danger ">Exportar
                                        CSV</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="info light-font mt-4 my-md-5">A diferencia de lo que ocurre con los
                    particulares, la distribución por
                    edad
                    de los funcionarios varones que murieron no está tan concentrada en un grupo
                    etario. En el caso de
                    las funcionarias la mayoría sí se ubica en la franja más joven, mientras que
                    para las mujeres
                    particulares esta distribución es más pareja entre los rangos de edad. Así, un
                    71% de las
                    funcionarias muertas de las que se disponen datos era menor de 30 años. En
                    cambio, los hombres
                    menores de 30 años ocupan un 25% del total de los funcionarios muertos, mientras
                    que un tercio de
                    los fallecidos tenía entre 31 y 41 años.
                </p>
            </div>
            <div class="block">
                <p class="block-title medium-font mb-md-0">Funcionaries muertes en hechos de
                    violencia, según el lugar de los
                    hechos.
                </p>
                <p class="block-title medium-font mb-5 gray">Capital Federal y Conurbano Bonaerense.</p>
                <div class="graphic d-flex" ng-controller="FuncionariosMapController as homeCtrl">
                    <div class="col-12 col-lg-6 p-0">
                        <div ng-show="loading">
                            <progress class="loader-mail pure-material-progress-linear" />
                        </div>
                       
                        <div class='chart map'>
                            <div id="funcionarios-map-graph"></div>
                            <p  class="map-detail d-lg-none" >
                                         <span ng-show="!loading && currentH.length == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </span>
                                <span ng-show="!loading && currentH.length > 0 && currentVictims == 0"> Elegí un lugar del
                                    mapa para explorar. </span>
                                    <span ng-show="currentH.length > 0 && currentVictims > 0"> 

                                    {{currentVictims}} víctimas en
                                    <span class="city"> {{currentCity}} </span> <span class="number"> {{currentPercentage | number:2}} %</small>
                                    </span>
                                    </p>
                        </div>
                    </div>
                    <div class="options d-none d-lg-block col-4">
                        <div class='chart map'>
                            <div id="funcionarios-map-graph"></div>
                            <p  class="map-detail" >
                                         <span ng-show="!loading && currentH.length == 0"> No hay resultado para los valores
                                    elegidos. Por favor, elegí otro filtro. </span>
                                <span ng-show="!loading && currentH.length > 0 && currentVictims == 0"> Elegí un lugar del
                                    mapa para explorar. </span>
                                    <span ng-show="currentH.length > 0 && currentVictims > 0"> 

                                    {{currentVictims}} víctimas en
                                    <span class="city"> {{currentCity}} </span> - <span class="number"> {{currentPercentage | number:2}} %</small>
                                    </span>
                                    </p>
                        </div>
                    </div>
                    <div class="options d-none d-lg-block col-2">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Filtros</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ap.selected" theme="selectize"
                                        on-select="onActiveLugar($item,$model)">
                                        <ui-select-match placeholder="Lugar">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in lugares | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ap.selected = undefined; onActiveLugar();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ag.selected" theme="selectize"
                                        on-select="onActiveGenero($item,$model,$select)">
                                        <ui-select-match placeholder="Género">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in genero | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ag.selected = undefined; onActiveGenero();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ai.selected" theme="selectize"
                                        on-select="onActiveInstitucion($item,$model)">
                                        <ui-select-match placeholder="Institución">
                                            {{$select.selected.key}}</ui-select-match>
                                        <ui-select-choices repeat="item in institucion | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ai.selected = undefined; onActiveInstitucion();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <ui-select ng-model="homeCtrl.ay.selected" theme="selectize"
                                        on-select="onActiveYear($item,$model)">
                                        <ui-select-match placeholder="Año">{{$select.selected.key}}
                                        </ui-select-match>
                                        <ui-select-choices repeat="item in years | filter: $select.search">
                                            <div ng-bind-html="item.key | highlight: $select.search">
                                            </div>
                                            <small ng-bind-html="item.key | highlight: $select.search"></small>
                                        </ui-select-choices>
                                    </ui-select>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            ng-click="homeCtrl.ay.selected = undefined; onActiveYear();"
                                            class="btn btn-default">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                                <span class="input-group-btn c">
                                    <button ng-click="exportCSV()" type="button" class="btn btn-danger ">Exportar
                                        CSV</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="info light-font mt-4">Al igual que ocurre con les particulares, la
                    amplia mayoría de les
                    funcionaries murió en el Conurbano. En el último año esta proporción superó el
                    95%. Casi la
                    totalidad de estos hechos ocurrieron cuando le funcionarie estaba fuera de
                    servicio. Esto explica el
                    traslado territorial de los patrones de letalidad policial: se trata de
                    funcionaries que viven en el
                    Gran Buenos Aires y desempeñan sus funciones en la Ciudad de Buenos Aires.
                </p>
            </div>
        </div>
    </div>
</section>