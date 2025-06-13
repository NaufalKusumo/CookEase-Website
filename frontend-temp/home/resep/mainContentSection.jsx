import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import { ChevronRight, ThumbsUp } from "lucide-react";
import React from "react";

export default function MainContentSection() {
  // Comment data
  const commentData = {
    author: "Naufal Kusumo",
    timeAgo: "2 hari yang lalu",
    content:
      "Resep ini sangat praktis dan cocok untuk siapa saja yang ingin membuat hidangan lezat dalam waktu singkat! Menambahkan sedikit terasi atau keju parut bisa memberikan rasa yang lebih unik",
    likes: 120,
    replies: 5,
  };

  return (
    <div className="flex gap-[7px] w-full py-4">
      <Avatar className="w-20 h-20">
        <AvatarImage src="" alt="Naufal Kusumo" />
        <AvatarFallback>NK</AvatarFallback>
      </Avatar>

      <div className="flex flex-col gap-2.5 w-full">
        <div className="flex items-center gap-2">
          <span className="font-normal text-2xl">{commentData.author}</span>
          <span className="font-extralight text-base">
            {commentData.timeAgo}
          </span>
        </div>

        <p className="font-normal text-[32px] leading-normal">
          {commentData.content}
        </p>

        <div className="flex items-center gap-[35px] mt-2">
          <div className="flex items-center gap-4">
            <div className="flex items-center gap-2.5">
              <ThumbsUp className="w-10 h-10" />
              <span className="font-normal text-2xl">{commentData.likes}</span>
            </div>
            <div className="w-5">
              <ThumbsUp className="w-10 h-10 text-blue-500" />
            </div>
          </div>

          <Button variant="ghost" className="font-normal text-2xl h-auto p-0">
            Balas
          </Button>
        </div>

        <Button
          variant="ghost"
          className="flex items-center gap-2.5 py-2.5 px-0 w-fit h-auto"
        >
          <ChevronRight className="w-10 h-10" />
          <span className="font-normal text-2xl">
            {commentData.replies} balasan
          </span>
        </Button>
      </div>
    </div>
  );
}
