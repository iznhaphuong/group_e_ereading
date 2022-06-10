<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-22">
    <div>
        <div class="box shadow-sm rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Recent</h6>
            </div>
            <div class="box-body p-0">
                <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                    </div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">DAILY RUNDOWN: WEDNESDAY</div>
                        <div class="small">Income tax sops on the cards, The bias in VC funding, and other top news for you</div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">3d</div>
                    </span>
                </div>
            </div>
        </div>
        <div class="box shadow-sm rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Earlier</h6>
            </div>
            <div class="box-body p-0">
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">DRM</div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                        <div class="small">Nunc purus metus, aliquam vitae venenatis sit amet, porta non est.</div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">3d</div>
                    </span>
                </div>
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" /></div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">DAILY RUNDOWN: SATURDAY</div>
                        <div class="small">Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper</div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">3d</div>
                    </span>
                </div>
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="" />
                    </div>
                    <div class="font-weight-bold mr-3">
                        <div>
                            <span class="font-weight-normal">Congratulate Mnadeep singh (iamgurdeeposahan)</span> for 4 years at Askbootsrap Pvt.
                            <div class="small text-success"><i class="fa fa-check-circle"></i> You sent Mandeep a message</div>
                        </div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">4d</div>
                    </span>
                </div>
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3 d-flex align-items-center bg-success justify-content-center rounded-circle text-white">M</div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                        <div class="small">Nunc purus metus, aliquam vitae venenatis sit amet, porta non est.</div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">3d</div>
                    </span>
                </div>
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" /></div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">DAILY RUNDOWN: SATURDAY</div>
                        <div class="small">Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper</div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1">3d</div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>