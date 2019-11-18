<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deals;
class ApiController extends Controller
{
    //
    public function getAllDeals() {
        // logic to get all deals goes here
        $deals = Deals::get()->toJson(JSON_PRETTY_PRINT);
        return response($deals, 200);
      }

      public function createDeal(Request $request) {
        // logic to create a deal record goes here
        $deal = new Deals;
        $deal->companyName = $request->companyName;
        $deal->companyType = $request->companyType;
        $deal->companyIndustry = $request->companyIndustry;
        $deal->companyAddress = $request->companyAddress;
        $deal->companyTel = $request->companyTel;
        $deal->companyEmail = $request->companyEmail;
        $deal->raisedAmount = $request->raisedAmount;
        $deal->DealDetailedDesc = $request->DealDetailedDesc;
        $deal->image = $request->image;
        $deal->save();

        return response()->json([
            "message" => "Deal record created"
        ], 201);
      }

      public function getDeal($id) {
        // logic to get a deal record goes here
        if (Deals::where('id', $id)->exists()) {
            $deal = Deals::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($deal, 200);
          } else {
            return response()->json([
              "message" => "Deal not found"
            ], 404);
          }
      }

      public function updateDeal(Request $request, $id) {
        // logic to update a deal record goes here
        if (Deals::where('id', $id)->exists()) {
            $deal = Deals::find($id);
            $deal->companyName = is_null($request->companyName) ? $deal->companyName : $request->companyName;
            $deal->companyType = is_null($request->companyType) ? $deal->companyType : $request->companyType;
            $deal->companyIndustry = is_null($request->companyIndustry) ? $deal->companyIndustry : $request->companyIndustry;
            $deal->companyAddress = is_null($request->companyAddress) ? $deal->companyAddress : $request->companyAddress;
            $deal->companyTel = is_null($request->companyTel) ? $deal->companyTel : $request->companyTel;
            $deal->companyEmail = is_null($request->companyEmail) ?  $deal->companyEmail : $request->companyEmail;
            $deal->raisedAmount = is_null($request->raisedAmount) ? $deal->raisedAmount : $request->raisedAmount;
            $deal->DealDetailedDesc = is_null($request->DealDetailedDesc) ?  $deal->DealDetailedDesc : $request->DealDetailedDesc;
            $deal->image = is_null($request->image) ?  $deal->image : $request->image;
            $deal->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Deal not found"
            ], 404);

        }
      }

      public function deleteDeal ($id) {
        // logic to delete a deal record goes here
        if(Deals::where('id', $id)->exists()) {
            $deal = Deals::find($id);
            $deal->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Deal not found"
            ], 404);
          }
      }
}
