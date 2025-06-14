import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { PlusCircle, Search } from "lucide-react";
import React from "react";
import { NewRecipesSection } from "./newRecipesSection";
import { RecipeCardSection } from "./recipeCardSection";
import { RecipeListSection } from "./recipeListSection";
import { TipsSection } from "./tipsSection";

export default function UserRegistered() {
  return (
    <div className="bg-[#f3f3f3] flex flex-row justify-center w-full">
      <div className="bg-[#f3f3f3] w-full max-w-[1440px] relative">
        {/* GroupWrapperSubsect - Top section with search and request button */}
        <div className="w-full relative">
          <div className="flex justify-between items-center p-4">
            {/* FrameSubsect - Search bar */}
            <div className="flex items-center gap-2.5 px-[15px] py-[5px] ml-[306px] rounded-[30px] border border-solid border-[#efdcab] shadow-[0px_4px_4px_#000000]">
              <Search className="w-[35px] h-[35px] text-brown" />
              <Input
                className="border-none shadow-none [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-xl bg-transparent w-auto focus-visible:ring-0 focus-visible:ring-offset-0"
                placeholder="Cari resep favoritmu di sini"
              />
            </div>

            {/* User profile icon */}
            <div className="flex items-center gap-4">
              <img className="w-[60px] h-[60px]" alt="User profile" src="" />

              {/* Request button */}
              <Button className="flex items-center justify-center gap-2.5 px-2.5 py-[3px] rounded-[15px] border border-solid border-black shadow-[0px_4px_4px_#000000] bg-transparent h-auto">
                <PlusCircle className="w-10 h-10" />
                <span className="[font-family:'Outfit-Bold',Helvetica] font-bold text-black text-2xl">
                  Request
                </span>
              </Button>
            </div>
          </div>
        </div>

        {/* FrameWrapperSubsect - Recipe sections */}
        <div className="w-full relative">
          <NewRecipesSection />
          <RecipeCardSection />
          <TipsSection />
          <RecipeListSection />
        </div>

        {/* GroupSubsect - Bottom section */}
        <div className="w-full relative"></div>
      </div>
    </div>
  );
}
