import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Card, CardContent } from "@/components/ui/card";
import { StarIcon } from "lucide-react";
import React from "react";

export default function InstructionsSection() {
  // Data for recipe cards
  const recipeCards = [
    {
      id: 1,
      title: "Nasi Goreng",
      author: "Naufal Kusumo",
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
      imageSrc: "", // Placeholder for image-1-9.png
      authorImageSrc: "", // Placeholder for person-10.png
    },
    {
      id: 2,
      title: "Nasi Goreng",
      author: "Naufal Kusumo",
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
      imageSrc: "", // Placeholder for image-1-10.png
      authorImageSrc: "", // Placeholder for image.png
    },
    {
      id: 3,
      title: "Nasi Goreng",
      author: "Naufal Kusumo",
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
      imageSrc: "", // Placeholder for image-1.png
      authorImageSrc: "", // Placeholder for person-2.png
    },
    {
      id: 4,
      title: "Nasi Goreng",
      author: "Naufal Kusumo",
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
      imageSrc: "", // Placeholder for image-1-2.png
      authorImageSrc: "", // Placeholder for person-3.png
    },
    {
      id: 5,
      title: "Nasi Goreng",
      author: "Naufal Kusumo",
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
      imageSrc: "", // Placeholder for image-1-3.png
      authorImageSrc: "", // Placeholder for person-4.png
    },
  ];

  return (
    <div className="flex flex-col w-full items-start gap-5">
      {recipeCards.map((recipe) => (
        <Card
          key={recipe.id}
          className="flex items-center gap-[9px] w-full border-none shadow-none"
        >
          <CardContent className="flex items-center gap-[9px] p-0 w-full">
            <img
              className="w-[189px] h-[126px] object-cover"
              alt="Nasi Goreng"
              src={recipe.imageSrc}
            />

            <div className="flex flex-col w-[177px] items-start gap-[29px]">
              <div className="flex flex-col items-start w-full">
                <h3 className="w-full [font-family:'Outfit-Regular',Helvetica] font-normal text-[32px] text-black tracking-[0] leading-normal mt-[-1.00px]">
                  {recipe.title}
                </h3>

                <div className="inline-flex h-8 items-center gap-[5px]">
                  <Avatar className="w-[25px] h-[25px]">
                    <AvatarImage
                      src={recipe.authorImageSrc}
                      alt={recipe.author}
                    />
                    <AvatarFallback>{recipe.author.charAt(0)}</AvatarFallback>
                  </Avatar>

                  <span className="[font-family:'Outfit-ExtraLight',Helvetica] font-extralight text-black text-sm tracking-[0] leading-normal">
                    {recipe.author}
                  </span>
                </div>
              </div>

              <div className="flex items-center gap-3 w-full">
                <div className="inline-flex items-center gap-0.5">
                  <StarIcon className="w-5 h-5 text-yellow-400" />
                  <span className="text-sm [font-family:'Outfit-Regular',Helvetica] font-normal text-black tracking-[0] leading-normal">
                    {recipe.rating}
                  </span>
                  <span className="text-sm [font-family:'Outfit-Regular',Helvetica] font-normal text-black tracking-[0] leading-normal">
                    ({recipe.reviews})
                  </span>
                </div>

                <span className="[font-family:'Outfit-Light',Helvetica] font-light text-sm text-black tracking-[0] leading-normal">
                  {recipe.timeAgo}
                </span>
              </div>
            </div>
          </CardContent>
        </Card>
      ))}
    </div>
  );
}
