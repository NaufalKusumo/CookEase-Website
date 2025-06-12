import { Card, CardContent } from "@/components/ui/card";
import { Clock } from "lucide-react";
import React from "react";

export default function CommentsSection() {
  // Recipe steps data for mapping
  const recipeSteps = [
    {
      step: 1,
      instruction: "Cuci beras lalu rendam dengan kunyit",
      id: "stopwatch",
    },
    {
      step: 2,
      instruction:
        "Tiriskan air, lalu kukus kurleb 30 menit atau setengah matang. Masukkan daun pandan 2 lembar.",
      id: "stopwatch2",
    },
    {
      step: 3,
      instruction:
        "Sambil menunggu kukusan nasi matang, tuang santan ke dalam panci, lalu beri kunyit bubuk. Aduk rata",
      id: "stopwatch3",
    },
    {
      step: 4,
      instruction:
        "Tambahkan daun pandan, daun salam, daun jeruk, serai, lengkuas, garam, kaldu jamur, penyedap dan gula. Harus terasa asin supaya nanti nasinya pas rasanya",
      id: "stopwatch4",
    },
    {
      step: 5,
      instruction:
        "Angkat beras yang sudah dikukus, lalu siram dengan santan sambil diaduk2.",
      id: "stopwatch5",
    },
    {
      step: 6,
      instruction: "Lalu tutup kurang lebih 30 menit",
      id: "stopwatch6",
    },
    {
      step: 7,
      instruction: "Kukus kembali hingga matang kurang lebih 60 menit",
      id: "stopwatch7",
    },
    {
      step: 8,
      instruction: "Angkat dan sajikan dengan pelengkapnya.",
      id: "stopwatch8",
    },
  ];

  return (
    <div className="flex flex-col items-start gap-[11px] w-full">
      {recipeSteps.map((item, index) => (
        <Card
          key={index}
          className="w-full bg-light rounded-[20px] shadow-[0px_4px_4px_#00000080]"
        >
          <CardContent className="flex items-start gap-5 px-[15px] py-2.5">
            <div className="flex flex-col w-[23px] items-center justify-center gap-2.5 bg-white">
              <div className="self-stretch mt-[-1.00px] text-4xl [font-family:'Outfit-Regular',Helvetica] font-normal text-black tracking-[0] leading-[normal]">
                {item.step}.
              </div>
            </div>

            <div className="w-[587px] mt-[-1.00px] [font-family:'Outfit-Regular',Helvetica] font-normal text-black text-4xl tracking-[0] leading-[normal]">
              {item.instruction}
            </div>

            <div className="relative w-[68px] h-16 mr-[-4.00px] flex items-center justify-center">
              <Clock size={64} className="text-gray-700" />
            </div>
          </CardContent>
        </Card>
      ))}
    </div>
  );
}
