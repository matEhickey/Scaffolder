<?php 
	include_once("../commons/commonBegin.php");
	
?>  

<div class="container">  
	<div class='row'>  

        <div class='col-md-6'>  
			<div class="panel panel-primary">  
				<div class="panel-heading">Élements graphiques</div>   
            	<div class="panel-body">
                
                    <div class="row">
                          <div class="btn-group btn-group-justified" role="group" aria-label="...">
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default">Left</button>
                          </div>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default">Middle</button>
                          </div>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default">Right</button>
                          </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                          <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Library</a></li>
                          <li class="active">Data</li>
                        </ol>
                    </div>
                    
                    <hr>
                    <div class="row" align="center">
                          <nav>
                              <ul class="pagination">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                    </div>
                    
                    <hr>
                    <div class="row" align="center">
                           <a href="#">Inbox <span class="badge">42</span></a>

                            <button class="btn btn-primary" type="button">
                              Messages <span class="badge">4</span>
                            </button>
                            
                    </div>
                    
                    <hr>
                    <div class="row" align="center">
                    
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                <span class="sr-only">45% Complete</span>
                              </div>
                          </div>
                            
                          <hr>
                          
                          <div class="progress">
                          <div class="progress-bar progress-bar-success" style="width: 35%">
                            <span class="sr-only">35% Complete (success)</span>
                          </div>
                          <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
                            <span class="sr-only">20% Complete (warning)</span>
                          </div>
                          <div class="progress-bar progress-bar-danger" style="width: 10%">
                            <span class="sr-only">10% Complete (danger)</span>
                          </div>
                        </div>
                        
                    </div>
                </div>  
                
                
			</div> 
            
            
            
            <div class="panel panel-primary">  
                <div class="panel-heading">panel</div>   
                <div class="panel-body">
                
                </div>  
            </div>
            
            <div class="panel panel-primary">  
                <div class="panel-heading">Paypal button</div>   
                <div class="panel-body">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="E2VUJKFCRSHHY">
                    <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                    <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </div>  
            </div>
            
            
            <div class="well">
            <h4>Well</h4>
            <p>Vestibulum semper malesuada arcu. In hac habitasse platea dictumst. Ut eu varius nisi. Mauris interdum ut lectus nec finibus.</p>
            </div>
            
                    
                
        </div>
        
        <div class='col-md-6'> 
        
            <div class="row">
            
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="http://www.beeple-crap.com/media/everyday10/february2016/big/02-26-16.jpg" alt="image">
                  <div class="caption">
                    <h3>Lorem ipsum</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="http://www.beeple-crap.com/media/everyday10/may2016/big/05-22-16.jpg" alt="image">
                  <div class="caption">
                    <h3>Lorem ipsum</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="http://www.beeple-crap.com/media/everyday10/april2016/big/04-29-16.jpg" alt="image">
                  <div class="caption">
                    <h3>Lorem ipsum</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
              </div>
              
            </div>

            
            <div class="panel panel-primary">  
				<div class="panel-heading">list</div>   
            	<div class="panel-body">
                    <ul class="list-group">
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>  
			</div>
            
            
            
            
        </div>
        
        
        
	</div>
    
    
    <div class='row'>  
        <div class='col-md-6'>  
        
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="http://www.beeple-crap.com/media/everyday10/may2016/big/05-07-16.jpg" alt="image1">
                </div>

                <div class="item">
                  <img src="http://www.beeple-crap.com/media/everyday10/may2016/big/05-31-16.jpg" alt="image2">
                </div>

                <div class="item">
                  <img src="http://www.beeple-crap.com/media/everyday10/february2016/big/02-05-16.jpg" alt="image3">
                </div>

                <div class="item">
                  <img src="http://www.beeple-crap.com/media/everyday10/february2016/big/02-12-16.jpg" alt="image4">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        
        
        </div>
        
        
        
        <div class="col-md-6">
            
            <div class="panel panel-primary">  
                <div class="panel-heading">Font awesome</div>   
                <div class="panel-body">
                    <i class="fa fa-5x fa-camera" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-bomb" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-book" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-bed" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-gamepad" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-flash" aria-hidden="true"></i>
                    <i class="fa fa-5x fa-search" aria-hidden="true"></i>
                    <hr>
                    <a href="http://fontawesome.io/icons/" class="btn btn-primary"><i class="icon-repeat"></i>Les autres</a>
                    <a class="btn" href="#">
                        <i class="icon-repeat"></i> Reload</a>
                </div>  
            </div>
            
            <div class="panel panel-primary">  
                <div class="panel-heading">DropDown / Select</div>   
                <div class="panel-body">
                
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    
                    <hr>
                    
                    <select class="form-control" name="select">
                      <option value="value1">Valeur 1</option> 
                      <option value="value2" selected>Valeur 2</option>
                      <option value="value3">Valeur 3</option>
                    </select>

                </div>  
            </div>
            
            
            <div class="panel panel-primary">  
                <div class="panel-heading">Modal</div>   
                <div class="panel-body">
                
                
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                      Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
                      Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                </div>  
            </div>
        </div>
        
        
        
    </div>
    
    
    
    
    <div class="row" style="padding: 20px;">
    
        <div class="col-md-8">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3NawwqfkubI"></iframe>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- 4:3 aspect ratio -->
            <div class="embed-responsive embed-responsive-4by3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jPnbd0s7buQ?list=RDa9qTQ0n1Hxk"></iframe>
            </div>
        </div>
    </div>

</div>  

<?php  
	include_once("../commons/commonEnd.php");  
?>  
