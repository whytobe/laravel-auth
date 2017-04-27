@extends('layouts.app')

@section('template_title')
    {{ trans('settings.settingsHomeTitle') }}
@endsection

@section('template_linked_css')
    <style type="text/css" media="screen">

        .admin-content:not(.active) {
            display: none;
        }

        body .admin-menu li,
        body .admin-menu li:hover,
        body .admin-menu li:focus {
            color: inherit;
            text-decoration: none;
            display: block;
            width: 100%;
            cursor: pointer
        }

        .tab-pane.active {
            border: 1px solid #ddd;
            border-top-color: #f5f8fa;
            background-color: #f5f8fa;
            padding: 1em;
            border-radius: 0 0 4px 4px;
        }

        label.settings-label {
            margin-top: 7px;
            text-align: right;
        }

        label.settings-label.select-label {
            margin-top: 9px;
        }





/*!
 * IP Address Widget for Bootstrap 3
//! version : 0.0.0
 */
.bootstrap-ipaddress-widget .btn {
    border: none;
}

.bootstrap-ipaddress-widget .btn:hover {
    background-color: #e6e6e6;
}

.bootstrap-ipaddress-widget .ipaddress-picker span.btn {
    font-weight: bold;
    font-size: 1.2em;
}

.bootstrap-ipaddress-widget table {
    width: 100%;
    margin: 0;
}

.bootstrap-ipaddress-widget td,
.bootstrap-ipaddress-widget th {
    text-align: center;
}

.bootstrap-ipaddress-widget span.btn,
.bootstrap-ipaddress-widget a.btn {
    width: 54px;
    height: 54px;
    line-height: 44px;
    margin: 2px 1.5px;
    cursor: pointer;
}

.bootstrap-ipaddress-widget span.btn:active,
.bootstrap-ipaddress-widget a.btn:active {
    -webkit-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
}





    </style>
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="admin-menu list-group">
                    <li class="list-group-item active" data-target-id="general"><i class="fa fa-sliders fa-fw margin-right-1"></i>{{ trans('settings.tabTitleGeneral') }}</li>
                    <li class="list-group-item" data-target-id="authentication"><i class="fa fa-lock fa-fw margin-right-1"></i>Authentication</li>
                    <li class="list-group-item" data-target-id="user_account"><i class="fa fa-users fa-fw margin-right-1"></i>User Account</li>
                    <li class="list-group-item" data-target-id="user_profile"><i class="fa fa-user-circle fa-fw margin-right-1"></i>User Profile</li>
                    <li class="list-group-item" data-target-id="email_settings"><i class="fa fa-envelope fa-fw margin-right-1"></i>Email Settings</li>
                    <li class="list-group-item" data-target-id="dev_settings"><i class="fa fa-cogs fa-fw margin-right-1"></i>Development</li>
                </ul>
            </div>
            <div class="col-md-9 admin-content active" id="general">

                <div class="panel panel-default">
                    <div class="panel-heading">

                        {{ trans('settings.panelTitleGeneral') }}

                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'id' => '']) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('appName') ? ' has-error ' : '' }}">
                                {!! Form::label('appName', trans('settings.appNameLabel'), array('class' => 'col-md-3 control-label settings-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('appName', old('appName'), array('id' => 'appName', 'class' => 'form-control', 'placeholder' => trans('settings.appNamePH'))) !!}
                                        <label class="input-group-addon" for="appName"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('appUrl') ? ' has-error ' : '' }}">
                                {!! Form::label('appUrl', trans('settings.appUrlLabel'), array('class' => 'col-md-3 control-label settings-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('appUrl', old('appUrl'), array('id' => 'appUrl', 'class' => 'form-control', 'placeholder' => trans('settings.appUrlPH'))) !!}
                                        <label class="input-group-addon" for="appUrl"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('appEnvironment') ? ' has-error ' : '' }}">
                                {!! Form::label('appEnvironment', trans('settings.appEnvironmentLabel') , array('class' => 'col-sm-3 control-label settings-label')); !!}
                                <div class="col-md-9">
                                    <select class="form-control" name="appEnvironmentId" id="appEnvironmentId">
                                        <option value="local">Local</option>
                                        <option value="development">development</option>
                                        <option value="qa">qa</option>
                                        <option value="staging">staging</option>
                                        <option value="production">production</option>
                                    </select>
                                    <span class="glyphicon {{ $errors->has('appEnvironment') ? ' glyphicon-asterisk ' : ' ' }} form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('appEnvironment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('appEnvironment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('debugMode') ? ' has-error ' : '' }} ">
                                {!! Form::label('debugMode', trans('settings.debugModeLabel'), array('class' => 'col-md-3 control-label settings-label select-label')); !!}
                                <div class="col-md-9">
                                    <label class="switch settings-label" for="debugMode">
                                        <span class="active"><i class="fa fa-toggle-on fa-2x"></i> {{ trans('settings.debugModeEnabled') }}</span>
                                        <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> {{ trans('settings.debugModeDisabled') }}</span>
                                        <input type="radio" name="debugMode" value="1" >
                                        <input type="radio" name="debugMode" value="0" >
                                    </label>

                                    @if ($errors->has('debugMode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('debugMode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('maintenanceMode') ? ' has-error ' : '' }} ">
                                {!! Form::label('maintenanceMode', trans('settings.maintenanceModeLabel'), array('class' => 'col-md-3 control-label settings-label select-label')); !!}
                                <div class="col-md-9">
                                    <label class="switch settings-label" for="maintenanceMode">
                                        <span class="active"><i class="fa fa-toggle-on fa-2x"></i> {{ trans('settings.maintenanceModeEnabled') }}</span>
                                        <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> {{ trans('settings.maintenanceModeDisabled') }}</span>
                                        <input type="radio" name="maintenanceMode" value="1" >
                                        <input type="radio" name="maintenanceMode" value="0" >
                                    </label>

                                    @if ($errors->has('debugMode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('debugMode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('nullIpAddress') ? ' has-error ' : '' }}">
                                {!! Form::label('nullIpAddress', trans('settings.nullIpAddressLabel'), array('class' => 'col-md-3 control-label settings-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('nullIpAddress', old('nullIpAddress') ?: '0.0.0.0', array('id' => 'nullIpAddress', 'class' => 'form-control ip-input', 'placeholder' => trans('settings.nullIpAddressPH'))) !!}
                                        <label class="input-group-addon" for="nullIpAddress"><i class="fa fa-fw fa-location-arrow }}" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
            <div class="col-md-9 admin-content" id="authentication">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Authentication
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
                            <li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation"><a href="#middleware" aria-controls="middleware" role="tab" data-toggle="tab">Middleware</a></li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="register">
                                Registration
                            </div>
                            <div role="tabpanel" class="tab-pane" id="login">
                                Login
                            </div>
                            <div role="tabpanel" class="tab-pane" id="middleware">
                                Middleware &amp; Other
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-9 admin-content" id="user_account">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Account
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">ONE</a></li>
                            <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab">TWO</a></li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="one">
                                ONE
                            </div>
                            <div role="tabpanel" class="tab-pane" id="two">
                                TWO
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-9 admin-content" id="user_profile">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Profile
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">three</a></li>
                            <li role="presentation"><a href="#four" aria-controls="four" role="tab" data-toggle="tab">four</a></li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="three">
                                three
                            </div>
                            <div role="tabpanel" class="tab-pane" id="four">
                                four
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-9 admin-content" id="email_settings">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Email Settings
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#five" aria-controls="five" role="tab" data-toggle="tab">five</a></li>
                            <li role="presentation"><a href="#six" aria-controls="six" role="tab" data-toggle="tab">six</a></li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="five">
                                five
                            </div>
                            <div role="tabpanel" class="tab-pane" id="six">
                                six
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-9 admin-content" id="dev_settings">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Development
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#seven" aria-controls="seven" role="tab" data-toggle="tab">seven</a></li>
                            <li role="presentation"><a href="#eight" aria-controls="eight" role="tab" data-toggle="tab">eight</a></li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="seven">
                                seven
                            </div>
                            <div role="tabpanel" class="tab-pane" id="eight">
                                eight
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>











@endsection



@section('footer_scripts')


    <script type="text/javascript">

        $(document).ready(function()
        {
            var navItems = $('.admin-menu > li');
            var navListItems = $('.admin-menu li');
            var allWells = $('.admin-content');
            var allWellsExceptFirst = $('.admin-content:not(:first)');

            allWellsExceptFirst.hide();
            navItems.click(function(e)
            {
                e.preventDefault();
                navListItems.removeClass('active');
                $(this).closest('li').addClass('active');

                allWells.hide();
                var target = $(this).attr('data-target-id');
                $('#' + target).show();
            });
        });

    </script>

  <script>
    $(document).ready(function(){
      $('.switch').click(function(){
        $(this).toggleClass('checked');
        $('input[name="debugMode"]').not(':checked').prop("checked", true);
      });
    });
  </script>



<script type="text/javascript">



/**
 * IP Address Widget for Bootstrap 3
//! version : 0.0.0
 */
; (function (factory) {
    if (typeof window.define === 'function' && window.define.amd) {
        // AMD is used - Register as an anonymous module.
        window.define(['jquery'], factory);
    } else {
        // AMD is not used - Attempt to fetch dependencies from scope.
        if (!jQuery) {
            throw 'bootstrap-ipaddress requires jQuery to be loaded first';
        } else {
            factory(jQuery);
        }
    }
}

(function ($) {

    var dpgId = 0,

// ReSharper disable once InconsistentNaming
    IPAddress = function (element, options) {
        var defaults = {
            icons: {
                up: 'glyphicon glyphicon-chevron-up',
                down: 'glyphicon glyphicon-chevron-down'
            },
            direction: 'auto'
        },

        picker = this,

        init = function () {
            picker.options = $.extend({}, defaults, options);
            picker.element = $(element);
            picker.id = dpgId++;
            picker.data = parseIpAddress();
            picker.isInput = picker.element.is('input');
            picker.component = false;

            /* Monitor Manual Change */
            if (picker.isInput)
                picker.element.keyup(changeInput);
            else
                picker.element.find('input').keyup(changeInput);

            picker.widget = getTemplate().appendTo('body');

            fillValues();
            updata();
            attachEvents();
        },

        changeInput = function () {
            var obj = $(this);
            setTimeout(function () {
                picker.data = parseIpAddress(obj.val());
                fillValue();
            }, 200);
        },

        parseIpAddress = function (data) {
            var defValue = [0, 0, 0, 0];

            if (data === null || (typeof data) === 'undefined')
                return defValue;

            var address = ($.isArray(data)) ? data : data.split('.');

            if (address.length < 4)
                return defValue;

            for (var i = 0; i < 4; ++i) {
                if (address[i] < 0)
                    address[i] = 0;
                else if (address[i] > 255)
                    address[i] = 255;
                else {
                    address[i] = parseInt(address[i], 10);

                    if (isNaN(address[i]))
                        address[i] = 0;
                }
            }

            address.length = 4;
            return address;
        },

        place = function () {
            var position = 'absolute',
            offset = picker.component ? picker.component.offset() : picker.element.offset(), $window = $(window);
            picker.width = picker.component ? picker.component.outerWidth() : picker.element.outerWidth();
            offset.top = offset.top + picker.element.outerHeight();

            var placePosition;
            if (picker.options.direction === 'up') {
                placePosition = 'top';
            } else if (picker.options.direction === 'bottom') {
                placePosition = 'bottom';
            } else if (picker.options.direction === 'auto') {
                if (offset.top + picker.widget.height() > $window.height() + $window.scrollTop() && picker.widget.height() + picker.element.outerHeight() < offset.top) {
                    placePosition = 'top';
                } else {
                    placePosition = 'bottom';
                }
            };
            if (placePosition === 'top') {
                offset.top -= picker.widget.height() + picker.element.outerHeight() + 15;
                picker.widget.addClass('top').removeClass('bottom');
            } else {
                offset.top += 1;
                picker.widget.addClass('bottom').removeClass('top');
            }

            if (picker.options.width !== undefined) {
                picker.widget.width(picker.options.width);
            }

            if (picker.options.orientation === 'left') {
                picker.widget.addClass('left-oriented');
                offset.left = offset.left - picker.widget.width() + 20;
            }

            if (isInFixed()) {
                position = 'fixed';
                offset.top -= $window.scrollTop();
                offset.left -= $window.scrollLeft();
            }

            if ($window.width() < offset.left + picker.widget.outerWidth()) {
                offset.right = $window.width() - offset.left - picker.width;
                offset.left = 'auto';
                picker.widget.addClass('pull-right');
            } else {
                offset.right = 'auto';
                picker.widget.removeClass('pull-right');
            }

            picker.widget.css({
                position: position,
                top: offset.top,
                left: offset.left,
                right: offset.right
            });
        },

        updata = function (newData) {
            var dataStr = newData;
            if (!dataStr) {
                if (picker.isInput) {
                    dataStr = picker.element.val();
                } else {
                    dataStr = picker.element.find('input').val();
                }
                picker.data = parseIpAddress(dataStr);
            }
            fillValue();
        },

        actions = {
            incAddress: function (e, idx) {
                checkData("inc", idx, 1);
            },

            decAddress: function (e, idx) {
                checkData("dec", idx, 1);
            },

            showPicker: function () {
                picker.widget.find('div:not(.ipaddress-picker)').hide();
                picker.widget.find('.ipaddress-picker').show();
            },

            showValues: function (e, idx) {
                picker.widget.find('.ipaddress-picker').hide();
                var widget = picker.widget.find('.ipaddress-values');
                widget.data('idx', idx);
                widget.show();
            },

            selectValue: function (e, idx) {
                picker.data[idx - 1] = parseInt($(e.target).text(), 10);
                actions.showPicker.call(picker);
            }
        },

        doAction = function (e) {
            var target = $(e.currentTarget);
            var idx = target.data('idx');
            var action = target.data('action');
            var rv = actions[action].apply(picker, [e, idx]);//arguments);
            stopEvent(e);
            set();
            fillValue();
            return rv;
        },

        stopEvent = function (e) {
            e.stopPropagation();
            e.preventDefault();
        },

        change = function (e) {
            var input = $(e.target), newData = input.val();

            updata();
            picker.setValue(parseIpAddress(newData));
            set();
            fillValue();
        },

        attachEvents = function () {
            picker.widget.on('click', '[data-action]', $.proxy(doAction, this));
            picker.widget.on('mousedown', $.proxy(stopEvent, this));
            picker.element.on({ 'change': $.proxy(change, this) }, 'input');

            if (picker.component) {
                picker.component.on('click', $.proxy(picker.show, this));
            } else {
                picker.element.on('click', $.proxy(picker.show, this));
            }
        },

        attachGlobalEvents = function () {
            $(window).on(
                'resize.ipaddress' + picker.id, $.proxy(place, this));
            $(document).on(
                'mousedown.ipaddress' + picker.id, $.proxy(picker.hide, this));
        },

        detachEvents = function () {
            picker.widget.off('click', '[data-action]');
            picker.widget.off('mousedown', picker.stopEvent);
            if (picker.isInput) {
                picker.element.off({
                    'focus': picker.show,
                    'change': picker.change
                });
            } else {
                picker.element.off({
                    'change': picker.change
                }, 'input');
                if (picker.component) {
                    picker.component.off('click', picker.show);
                } else {
                    picker.element.off('click', picker.show);
                }
            }
        },

        detachGlobalEvents = function () {
            $(window).off('resize.ipaddress' + picker.id);
            $(document).off('mousedown.ipaddress' + picker.id);
        },

        isInFixed = function () {
            if (picker.element) {
                var parents = picker.element.parents(), inFixed = false, i;
                for (i = 0; i < parents.length; i++) {
                    if ($(parents[i]).css('position') == 'fixed') {
                        inFixed = true;
                        break;
                    }
                }
                ;
                return inFixed;
            } else {
                return false;
            }
        },

        set = function () {
            var formatted = picker.data.join('.');
            var input = picker.element.find('input');
            input.val(formatted);
            picker.element.val(formatted).change();
        },

        checkData = function (direction, unit, amount) {
            var idx = unit - 1;
            if (!(idx >= 0 && idx <= 3)) return;

            if (direction == "inc" && picker.data[idx] < 255) {
                picker.data[idx] += amount;
            }

            if (direction == "dec" && picker.data[idx] > 0) {
                picker.data[idx] -= amount;
            }
        },

        getTemplate = function () {
            var addressTemplate = function (i) {
                return $('<span>').addClass('btn').attr('data-action', 'showValues').attr('data-idx', i).attr('data-component', 'address' + i);
            };
            var addressTemplateUp = function (i) {
                return $('<a>').addClass('btn').attr('href', '#').attr('data-action', 'incAddress').attr('data-idx', i)
                    .append($('<span>').addClass(picker.options.icons.up));
            };
            var addressTemplateDown = function (i) {
                return $('<a>').addClass('btn').attr('href', '#').attr('data-action', 'decAddress').attr('data-idx', i)
                    .append($('<span>').addClass(picker.options.icons.down));
            };

            var template = [
                $('<div>').addClass('ipaddress-picker')
                .append($('<table>').addClass('table-condensed').append([
                    $('<tr>').append([
                        $('<td>').append(addressTemplateUp(1)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateUp(2)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateUp(3)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateUp(4))
                    ]),
                    $('<tr>').append([
                        $('<td>').append(addressTemplate(1)),
                        $('<td>').addClass('separator').html('.'),
                        $('<td>').append(addressTemplate(2)),
                        $('<td>').addClass('separator').html('.'),
                        $('<td>').append(addressTemplate(3)),
                        $('<td>').addClass('separator').html('.'),
                        $('<td>').append(addressTemplate(4))
                    ]),
                    $('<tr>').append([
                        $('<td>').append(addressTemplateDown(1)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateDown(2)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateDown(3)),
                        $('<td>').addClass('separator'),
                        $('<td>').append(addressTemplateDown(4))
                    ])
                ])),
                $('<div>').addClass('ipaddress-values').attr('data-action', 'selectValue').append($('<table>').addClass('table-condensed'))
            ];

            return $('<div>').addClass('bootstrap-ipaddress-widget dropdown-menu')
                .append(template);
        },

        fillValues = function () {
            var ipval = [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 255];
            var table = picker.widget.find('.ipaddress-values table');
            var html = [];
            var row = $('<tr>');

            table.parent().hide();
            for (var i = 0; i < ipval.length; ++i) {
                if (i % 4 === 0) {
                    row = $('<tr>');
                    html.push(row);
                }
                row.append(
                    $('<td>').addClass('second').append(
                        $('<span>').addClass('btn').html(ipval[i].toString())));
            }

            table.empty().append(html);
        },

        fillValue = function () {
            var timeComponents = picker.widget.find('span[data-component]');

            if (!picker.data)
                picker.data = parseIpAddress();

            for (var i = 0; i < 4; ++i)
                timeComponents.filter(
                    '[data-component=address' + (i + 1) + ']').text(picker.data[i]);
        };

        picker.destroy = function () {
            detachEvents();
            detachGlobalEvents();
            picker.widget.remove();
            picker.element.removeData('IPAddress');
            if (picker.component)
                picker.component.removeData('IPAddress');
        };

        picker.show = function (e) {
            picker.widget.show();
            picker.height = picker.component ? picker.component.outerHeight() : picker.element.outerHeight();
            place();
            attachGlobalEvents();
            if (e) {
                stopEvent(e);
            }
        },

        picker.disable = function () {
            var input = picker.element.find('input');
            if (input.prop('disabled')) return;

            input.prop('disabled', true);
            detachEvents();
        },

        picker.enable = function () {
            var input = picker.element.find('input');
            if (!input.prop('disabled')) return;

            input.prop('disabled', false);
            attachEvents();
        },

        picker.hide = function (event) {
            if (event && $(event.target).is(picker.element.attr("id")))
                return;

            picker.widget.hide();
            detachGlobalEvents();
        },

        picker.setValue = function (newData) {
            picker.data = parseIpAddress(newData);
            set();
            fillValue();
        };

        init();
    };

    $.fn.ipaddress = function (options) {
        return this.each(function () {
            var $this = $(this), data = $this.data('IPAddress');
            if (!data) $this.data('IPAddress', new IPAddress(this, options));
        });
    };
}));


</script>




  <script type="text/javascript">
  //<![CDATA[
  $(document).ready(function () {

     $('.ip-input').ipaddress();

  });
  //]]>
 </script>



@endsection





