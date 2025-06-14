import { Card, CardContent } from "@/components/ui/card";
import React from "react";

export default function RatingSection() {
  // Create an array of ingredients for easier mapping
  const ingredients = [
    "3 kg beras",
    "300 g ketan",
    "3000 ml santan",
    "5 lembar daun pandan",
    "40 lembar daun salam",
    "10 lembar daun jeruk",
    "3 kg beras", // This appears to be a duplicate from the original code
  ];

  return (
    <Card className="w-full max-w-md border-none shadow-none">
      <CardContent className="p-0">
        <ul className="flex flex-col gap-2.5">
          {ingredients.map((ingredient, index) => (
            <li
              key={index}
              className="w-full [font-family:'Outfit-Light',Helvetica] font-light text-black text-[32px] leading-normal"
            >
              {ingredient}
            </li>
          ))}
        </ul>
      </CardContent>
    </Card>
  );
}
