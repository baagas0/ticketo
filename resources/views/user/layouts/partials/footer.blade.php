<footer id="tg-footer" class="tg-footer tg-haslayout">
    <div class="tg-fourcolumns">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgettext">
                        <div class="tg-widgettitle">
                            <h3>About {{ config('app.name', 'Ticketo') }}</h3>
                        </div>
                        <div class="tg-widgetcontent">
                            <div class="tg-description">
                                <p>{{ Setting('description')->text }}</p>
                            </div>
                            <span>{{ wordwrap(Setting('number')->text, 4 , ' ' , true) }}</span>
                            <a href="mailto:{{ Setting('email')->text }}">{{ Setting('email')->text }}</a>
                            <ul class="tg-socialicons tg-socialiconsvtwo">
                                <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgettravelunews">
                        <div class="tg-widgettitle">
                            <h3>Ticketo News</h3>
                        </div>
                        <div class="tg-widgetcontent">
                            <ul>
                                @foreach(Tour() as $row)
                                <li>
                                    <figure>
                                        <a href="javascript:void(0);"><img src="{{ asset($row->image) }}" style="width: 63px;height: 63px" alt="image destinations"></a>
                                    </figure>
                                    <div class="tg-newcontent">
                                        <h4><a href="javascript:void(0);">{{ Str::limit($row->title, 20) }}</a></h4>
                                        <div class="tg-description">
                                            <p>{{ Str::limit($row->description, 42) }}</p>
                                        </div>
                                        <time datetime="2017-06-06">{{ \Carbon\Carbon::parse($row->schedulle->date)->format('d M Y') }}</time>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgetdestinations">
                        <div class="tg-widgettitle">
                            <h3>Top Destinations</h3>
                        </div>
                        <div class="tg-widgetcontent">
                            <ul>
                                @foreach(Destination() as $row)
                                <li><a href="javascript:void(0);">{{ $row->destination->name.', '.$row->destination->country }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgetnewsletter">
                        <div class="tg-widgettitle">
                            <h3>Newsletter</h3>
                        </div>
                        <div class="tg-widgetcontent">
                            <div class="tg-description"><p>Sign up for our mailing list to get latest updates and offers</p></div>
                            <form class="tg-formtheme tg-formnewsletter">
                                <fieldset>
                                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                                    <button type="submit"><img src="{{ asset('images/icons/icon-08.png') }}" alt="image destinations"></button>
                                </fieldset>
                            </form>
                            <span>We respect your privacy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-footerbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>Copyright &copy; 2021 Ticketo. All  rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
