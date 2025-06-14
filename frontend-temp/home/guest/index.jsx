import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Search } from "lucide-react";
import React from "react";
import { FeaturedRecipesSection } from "./featuredRecipesSection";
import { NavigationSection } from "./navigationSection";
import { RecipeListSection } from "./recipeListSection";
import { TipsSection } from "./tipsSection";

export default function Guest() {
  return (
    <div className="bg-[#f3f3f3] flex flex-row justify-center w-full">
      <div className="bg-[#f3f3f3] overflow-hidden w-full max-w-[1440px] relative">
        {/* GroupSubsect - Navigation at top */}
        <div className="w-full px-8 py-4">
          <NavigationSection />
          <div className="flex items-center gap-2.5 px-[15px] py-[5px] absolute top-10 left-[276px] rounded-[30px] border border-solid border-wheat shadow-[0px_4px_4px_#000000] bg-white">
            <Search className="w-[35px] h-[35px] text-brown" />
            <Input
              className="border-0 shadow-none [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-xl focus-visible:ring-0"
              placeholder="Cari resep favoritmu di sini"
            />
          </div>

          <Button
            variant="outline"
            className="absolute top-4 right-8 rounded-[30px] border-[1.5px] border-solid border-black shadow-[0px_4px_4px_#000000] [font-family:'Outfit-Bold',Helvetica] font-bold text-black text-2xl h-auto"
          >
            Login/Register
          </Button>
        </div>

        {/* FrameSubsect - Recipe List Section */}
        <div className="w-full relative bg-[url(/flat-lay-mozzarella-tomatoes-copy-space-1.png)] bg-cover bg-[50%_50%]">
          <RecipeListSection />
        </div>

        {/* FrameWrapperSubsect - Featured Recipes and Tips */}
        <FeaturedRecipesSection />
        <TipsAndTricksSection />
      </div>
    </div>
  );
}
