import { Button } from "@/components/ui/button";
import React from "react";

const RecipeCardSection = () => {
  return (
    <section className="flex flex-col gap-[30px] py-[60px] px-[30px]">
      <h1 className="font-bold text-[64px] text-black font-['Outfit-Bold',Helvetica] leading-tight">
        Cook Like a Pro With Our Easy And Tasty Recipes
      </h1>

      <p className="text-2xl text-black font-['Outfit-Regular',Helvetica] max-w-[672px]">
        Discover simple, mouthwatering recipes that anyone can whip up in
        minutes
      </p>

      <Button
        variant="outline"
        className="w-fit h-auto px-5 py-3 text-2xl font-['Outfit-Regular',Helvetica] text-black rounded-[15px] border-black shadow-[0px_4px_4px_#000000]"
      >
        Explore All Recipes
      </Button>
    </section>
  );
};

export default RecipeCardSection;
