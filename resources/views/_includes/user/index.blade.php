
            <div class="content">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">

                                <div class="header">
                                    <h4 class="title">Today's Activites</h4>
                                    <p class="category">Performance Track</p>
                                </div>
                                <div class="content">
                                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Open
                                            <i class="fa fa-circle text-danger"></i> Bounce
                                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">{{Auth::user()->name}} Prescriptios</h4>
                                    <p class="category">Recently issued</p>
                                </div>
                                <div class="content">
                                     <div class="row">
                                      <div class="col-md-6  col-md-offset-3 searchbox">
                                         <div class="input-group">
                                            <input type="text" id="searchtext" class="form-control" placeholder="Search for...">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" id="search" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
                                            </span>
                                         </div>
                                         <!-- /input-group -->
                                      </div>
                                      <div class="col-md-3 searchbox"><button class="btn btn-success" id="reload">Reload</button></div>
                                   </div>

                                   <div class="row">
                                      <div class="panel-body">
                                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                         </div>
                                         <hr>
                                         <button id="older" class="btn btn-default col-md-offset-5">Older</button>
                                      </div>
                                   </div>
                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Issued
                                            <i class="fa fa-circle text-danger"></i> Pending
                                            <i class="fa fa-circle text-warning"></i> Obsolte
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                        </div>
                                    </div>
                                
                                </div>


                            </div>
                        </div>


                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Health Monitoring Statistics</h4>
                                    <p class="category">Vitals Performance</p>
                                </div>
                                <div class="content" >
                                    <img id="chartActivity" class="ct-chart" src="{{asset('images/Capture.JPG')}}"></img>

                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Heart Performance
                                            <i class="fa fa-circle text-danger"></i> Lungs Performance
                                            <i class="fa fa-circle text-default"></i> Blood Pressure
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Check List</h4>
                                    <p class="category">Keep the good work</p>
                                </div>
                                <div class="content">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox1" type="checkbox">
                                                            <label for="checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    <td>Wake up Early, Be active throughout your day</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox2" type="checkbox" checked>
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>15 Minutes Exercise, Move more, snack less</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox3" type="checkbox">
                                                            <label for="checkbox3"></label>
                                                        </div>
                                                    </td>
                                                    <td>Following your Healthy Diet, Activate your passion for Healthy food. 
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox4" type="checkbox" checked>
                                                            <label for="checkbox4"></label>
                                                        </div>
                                                    </td>
                                                    <td>Drink a lot of Water, keep your body hydrated</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox5" type="checkbox">
                                                            <label for="checkbox5"></label>
                                                        </div>
                                                    </td>
                                                    <td>You need to take this medicine three times a day</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="checkbox6" type="checkbox" checked>
                                                            <label for="checkbox6"></label>
                                                        </div>
                                                    </td>
                                                    <td>Doze Control: Eat Right and You'll Sleep Like a Baby</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>