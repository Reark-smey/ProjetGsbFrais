@extends('layouts.master')
@section('content')

	<h1> </h1>
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <th style="width:30%">Période</th>
        <th style="width:30%">Montant validé</th>
        <th style="width:20%">Modifier</th>
        <th style="width:20%">Supprimer</th>
        </thead>
        @foreach($mesFrais as $frais)
            <tr>
                <td>{{$frais->anneemois}} </td>
                <td>{{$frais->montantvalide}} </td>
                <td style="text-align:center;">
                    <a href="{{url('/updateFrais')}}/{{$frais->id_frais}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                    </a>
                </td>
                <td style="text-align:center;">
                    <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                    window.location='{{url('/supprimerFrais')}}/{{$frais->id_frais}}'
					}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                              title="Supprimer"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('vues/error')
