import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockTripData } from '../data/mockData';

interface FollowUpProposalEmailProps extends CommonEmailProps {
  destination?: string;
}

export const FollowUpProposalEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  destination = mockTripData.destination,
}: FollowUpProposalEmailProps) => {
  const previewText = 'Seguimos dando forma a vuestro viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Espero que estés teniendo una excelente semana.
          </Paragraph>
          <Paragraph>
            Te escribo brevemente para retomar el hilo de la propuesta de viaje a {destination} que te envié hace unos días. Sé que revisar estas cosas requiere tranquilidad para imaginar el viaje y valorar cada detalle.
          </Paragraph>
          <Paragraph>
            Solo quería recordarte que sigo aquí para cualquier duda, cambio o ajuste que te apetezca hacer. La propuesta es flexible y la idea es ir dándole forma contigo hasta que la sientas completamente tuya.
          </Paragraph>
          
          <CTAButton href={`mailto:${senderEmail}?subject=Dudas sobre mi propuesta - ${clientName}`}>
            Comentar mi propuesta
          </CTAButton>
          
          <Paragraph>
            Si prefieres que lo veamos hablando un rato, me dices y buscamos un momento.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default FollowUpProposalEmail;
